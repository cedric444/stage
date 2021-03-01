<?php
class Expense
{
    private $_idExpense;
    private $_sum;
    private $_idUser;

    public function getIdExpense()
    {
        return $this->_idExpense;
    }
    public function setIdExpense($_idExpense)
    {
        return $this->_idExpense = $_idExpense;
    }
    public function getSum()
    {
        return $this->_sum;
    }
    public function setSum($_sum)
    {
        return $this->_sum = $_sum;
    }
    public function getIduser()
    {
        return $this->_idUser;
    }
    public function setIduser($_idUser)
    {
        return $this->_idUser = $_idUser;
    }

    public function __construct(array $options = [])
    {
        if (!empty($options)) {
            $this->hydrate($options);
        }
    }

    public function hydrate($data)
    {
        foreach ($data as $key => $value) {
            $methode = "set" . ucfirst($key);
            if (is_callable(([$this, $methode]))) {
                $this->$methode($value);
            }
        }
    }

}
