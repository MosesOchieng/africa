module Main (main) where

import Lib

main :: IO ()

data SplitData =
    SplitData

        { recipient1 :: Address -- ^ First recipient of the funds
        , recipient2 :: Address -- ^ Second recipient of the funds
        , amount     :: Ada.Ada -- ^ How much Ada we want to lock
        }
    deriving stock (Haskell.Show, Generic)

PlutusTx.unstableMakeIsData ''SplitData
PlutusTx.makeLift ''SplitData

d -> r -> ScriptContext -> Bool
