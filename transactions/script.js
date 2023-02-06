const transactionsUl = document.querySelector("#transactions")
const incomeDisplay = document.querySelector("#money-plus")
const expenseDisplay = document.querySelector("#money-minus")
const balanceDisplay = document.querySelector("#balance")
const form = document.querySelector("#form")
const inputTransactionName = document.querySelector("#text")
const inputTransactionAmount = document.querySelector("#amount")
const body = document.querySelector("body")

const localStorageTransactions = JSON.parse(localStorage
  .getItem("transactions"))
let transactions = localStorage
  .getItem("transactions") !== null ? localStorageTransactions : []

const removeTransaction = ID => {
  transactions = transactions.filter(transaction =>
    transaction.id !== ID)
  updateLocalStorage()
  init()
}

const addTransactionIntoDom = ({ amount, name, id }) => {
  const operator = amount < 0 ? "-" : "+"
  const CSSClass = amount < 0 ? "minus" : "plus"
  const amountWithoutOperator = Math.abs(amount)
  const li = document.createElement("li")

  li.classList.add(CSSClass)
  li.innerHTML = `
    ${name}
    <span>${operator} Ksh.${amountWithoutOperator}</span>
    <button class="delete-btn" onClick="removeTransaction(${id})">
      x
    </button>
  `
  transactionsUl.append(li)
}

const getExpenses = (transactionsAmounts) =>
  Math.abs(transactionsAmounts
    .filter(value => value < 0)
    .reduce((accumulator, value) => accumulator + value, 0))
    .toFixed(2)

const getIncomes = (transactionsAmounts) =>
  transactionsAmounts
    .filter(value => value > 0)
    .reduce((accumulator, value) => accumulator + value, 0)
    .toFixed(2)

const getTotal = (transactionsAmounts) =>
  transactionsAmounts
    .reduce((accumulator, transaction) => accumulator + transaction, 0)
    .toFixed(2)

const updateBalanceValues = () => {
  const transactionsAmounts = transactions.map(({ amount }) => amount)
  const total = getTotal(transactionsAmounts)
  const income = getIncomes(transactionsAmounts)
  const expense = getExpenses(transactionsAmounts)

  transactionsUl.scroll({ top: 2000, left: 0, behavior: 'smooth' });

  balanceDisplay.textContent = `Ksh. ${total}`
  incomeDisplay.textContent = `Ksh. ${income}`
  expenseDisplay.textContent = `Ksh. ${expense}`
}

const init = () => {
  transactionsUl.innerHTML = ""
  transactions.forEach(addTransactionIntoDom)
  updateBalanceValues()
}

init()

const updateLocalStorage = () => {
  localStorage.setItem("transactions", JSON.stringify(transactions))
}

const generateID = () => Math.round(Math.random() * 1000)

const addToTransactionsArray = (transactionName, transactionAmount) => {
  transactions.push({
    id: generateID(),
    name: transactionName,
    amount: Number(transactionAmount)
  })
}

const cleanInputs = () => {
  inputTransactionName.value = ""
  inputTransactionAmount.value = ""
}

const handleFormSubmit = event => {
  event.preventDefault()

  const transactionName = inputTransactionName.value.trim()
  const transactionAmount = inputTransactionAmount.value.trim()
  const isSomeInputEmpty = transactionName === "" || transactionAmount === ""

  if (isSomeInputEmpty) {
    alert("Transaction Empty .Kindly fill in values to get underway.!")
    return
  }

  addToTransactionsArray(transactionName, transactionAmount)
  init()
  updateLocalStorage()

  cleanInputs()
}

form.addEventListener("submit", handleFormSubmit)