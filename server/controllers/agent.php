<?php

class agent
{
    public $table = 'agent';
    public $branchTable = 'branch';

    public function registerAgent($names, $telephone, $address, $branch, $code)
    {

        $countAgents = countAffectedRows($this->table, "agent_phone= '$telephone' LIMIT 1");


        if (!$countAgents) {
            $getBranch = select('*', $this->branchTable, "bra_id='$branch'");
            foreach ($getBranch as $branchRow) {
                $branchName = $branchRow['bra_name'];
            }

            $data = ['names' => $names, 'phone' => $telephone, 'status' => 1, 'code' => $code, 'address' => $address, 'branch' => $branch];
            $dataStructure = '`agent_fullnames`, `agent_phone`, `agent_status`, `agent_code`, `agent_location`, `bra_id`';
            $values = ':names,:phone,:status,:code,:address,:branch';
            insert($this->table, $dataStructure, $values, $data);
            $smsMessage = 'Hello ' . $names . ' Welcome to Lost & found system , You have been successfully registered into the system as a logistic agent at ' . $branchName . ', Your account code is ' . $code;
            sendSms($telephone, $smsMessage);
            $message = '<div class="alert alert-success alert-dismissible fade show col-5 offset-4" role="alert">
          <strong> Logistic agent account created successfully </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
          </button>
            </div>';
            echo $message;
            echo "<script>" . 'setTimeout(function(){ window.location = "logistic"}, 2000);' . "</script>";
        } else {
            $message = '<div class="alert alert-danger alert-dismissible fade show col-4 offset-4" role="alert">
          <strong> Telephone number is already taken</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
          </button>
            </div>';
            echo $message;
        }
    }

    public function assignDelivery()
    {
        
    }
}
