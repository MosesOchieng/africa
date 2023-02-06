function renderCustomDate(time) {
    const date = new Date(time * 1000);
    return `
<div>${date.toLocaleDateString()}</div>
<div>${date.toLocaleTimeString()}</div>
`;
}


function renderChange(value) {
    if (value < 0) {
        return `<i style="color: #f44336" class="fas fa-chevron-down"></i> <span class="percent-change percent-change--down">${value}%</span>`;
    } else {
        return `<i style="color: #4caf50" class="fas fa-chevron-up"></i> <span class="percent-change percent-change--up">${value}%</span>`;
    }
}


function renderPrice(value) {
    const dollars = value.split('.')[0];
    const cents = value.split('.')[1];
    return `
<div class="price">
<div class="price__dollars">$${dollars}</div>
<div class="price__cents">${cents.slice(0,2)}</div>
</div>
`;
}


window.onload = () => {

    ZingGrid.registerMethod(renderCustomDate, 'renderCustomDate');
    ZingGrid.registerMethod(renderChange, 'renderChange');
    ZingGrid.registerMethod(renderPrice, 'renderPrice');
}