<?php

class agent
{
    public $table = 'agent';
    public $branchTable = 'branch';
    public $deliveryTable = 'document_delivery';

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

    public function assignDelivery($agent, $claim, $claimAddress, $claimer, $claimTel)
    {
        $checkRedudancy = countAffectedRows($this->deliveryTable, "claim_id='$claim' AND agent_id='$agent' LIMIT 1");
        if ($checkRedudancy) {
            $message = '<div class="alert alert-danger alert-dismissible fade show col-12" role="alert">
            <strong> This claim is already assigned for delivery</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
              </div>';
            echo $message;
        } else {
            $data = ['claim' => $claim, 'agent' => $agent, 'date' => date('d/m/Y'), 'status' => 0];
            $dataStructure = '`claim_id`, `agent_id`, `docd_date`, `docd_status`';
            $values = ':claim,:agent,:date,:status';
            insert($this->deliveryTable, $dataStructure, $values, $data);
            $fetchAgent = select('*', 'agent,claim', "agent_id='$agent'");
            foreach ($fetchAgent as $agent) : endforeach;
            $smsMessage = 'Hello ' . $agent['agent_fullnames'] . ' You have been assigned a package to deliver for client ' . $claimer . ' Located at ' . $claimAddress . ' contact him/her on ' . $claimTel . ' . Please deliver the package ASAP';
            sendSms($agent['agent_phone'], $smsMessage);
            $message = '<div class="alert alert-success alert-dismissible fade show col-12" role="alert">
            <strong> Document have been assigned successfuly</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
              </div>';
            echo $message;
        }
    }

    public function registerBranch($branchName, $branchCode)
    {

        $checkRedudancy = countAffectedRows('branch', "bra_name='$branchName' or bra_code='$branchCode' LIMIT 1");
        if ($checkRedudancy) {
            $message = '<div class="alert alert-danger alert-dismissible fade show col-4 offset-4" role="alert">
            <strong> Branch Already registered</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
              </div>';
            echo $message;
        } else {
            $data = ['branch' => $branchName, 'code' => $branchCode, 'status' => 0];
            $dataStructure = '`bra_name`, `bra_code`, `bra_status`';
            $values = ':branch,:code,:status';
            insert('branch', $dataStructure, $values, $data);
            $message = '<div class="alert alert-success alert-dismissible fade show col-4 offset-4" role="alert">
            <strong> Branch registered successfuly</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
              </div>';
            echo $message;
        }
    }
}
