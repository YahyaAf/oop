<?php 

interface IBankAccount {
    function withdraw($amount);
}

abstract class BankAccount implements IBankAccount  {
    protected float $balance;
    protected string $accoutOwner;
    private static int  $numberAccount = 0;
    private array $transactions = [];

    function __construct($balance, $name) {
        $this->balance = $balance;
        $this->accoutOwner = $name;
        self::$numberAccount++;
        $this->insertTransaction("Account initilze with: $balance");
    }

    abstract function withdraw($amount);

    public function deposit($amount) {
        if($amount <= 0) {
            echo "Amount must me grater that 0";
            return;
        }
        $this->balance += $amount;
        $this->insertTransaction("Deposit: $amount");
        echo "New balance = $this->balance";
    }

    protected function insertTransaction($transaction) {
        $this->transactions[] = $transaction;
    }

    public function getAllTransactions() {
        foreach($this->transactions as $transaction) {
            echo "$transaction <br>";
        }
    }

    public static function getTotalAccounts() {
        return self::$numberAccount;
    }

}

class SavingAccount extends BankAccount {

    private float $minBalance = 100;

    public function withdraw($amount) {
        if($amount < 0 ) {
            echo "Amount must be greater than 0";
            return;
        }

        if($this->balance - $amount < $this->minBalance) {
            echo "Withdraw rejected";
            return;
        }

        $this->balance -= $amount;
        $this->insertTransaction("Withdraw: $amount");
        echo "new balance: $this->balance";

    }
}

class NormalAccount extends BankAccount {
    private float $maxCredit = 500;

    public function withdraw($amount) {
        if($amount < 0) {
            echo "Amount must me greater than 0";
            return;
        }
        if($this->balance - $amount > -$this->maxCredit) {
            echo "Withdraw rejected";
            return;
        }

        $this->balance -= $amount;
    }
}

// create a new object of SavingAccount
$account1 = new SavingAccount(500, "Ahmed");
// deposit 1000
$account1->deposit(1000);
// withdraw 1000
$account1->withdraw(1000);
// withdraw 700
$account1->withdraw(700);

$account2 = new SavingAccount(20, "yassine");
echo BankAccount::getTotalAccounts();
$account1->getAllTransactions();