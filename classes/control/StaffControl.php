<?php
require_once(__DIR__ . '/../Dbh.php');
class StaffControl
{
    private $db;
    function __construct()
    {
        $this->db = new Dbh();
    }
    public function searchByID($id, array $items, $allFlag = true, $likeFlag = true)
    {
        $item = implode(", ", $items);
        return $this->search($item, array("ID" => $id), $allFlag, $likeFlag);
    }
    public function search($items, $where = null, $allFlag = false, $likeFlag = false)
    {
        return $this->db->select('staffs', $items, $where, $allFlag, $likeFlag);
    }
    public function addLeaveRequest($items)
    {
        $this->db->insert('leaveregister', $items);
    }
    public function searchIDStandard($fname, $email, $lname, $role, $sDate)
    {
        $staffIdentifier = array(
            'fname' => $fname,
            'lname' => $lname,
            'email' => $email,
            'task' => $role,
            'startDate' => $sDate
        );
        return $this->search("ID", $staffIdentifier);
    }
    public function takeLeave($id, $leaveType)
    {
        // if it is annual leave reduce their annual leave day
        if ($leaveType === "al") {
            $this->db->updateAmount('staffs', array('annualLeaveDay' => -1), array('ID' => $id));
        }
        // set staff to on leave
        $this->db->update('staffs', array('availability' => "on leave"), array('ID' => $id));
    }
    public function searchLeaveRequest(array $items = null, array $where = null, $staffName = false, $likeFlag = false)
    {
        $itemStr = implode(", ", $items);
        $results = $this->db->select('leaveregister', $itemStr, $where, true, $likeFlag);
        if (!$staffName) {
            return $results;
        }
        if (is_array($results)) {
            

            foreach ($results as $key => $leaveRequest) {
                // echo var_dump($leaveRequest['staffID']) . "<br>";
                $staff = $this->searchByID($leaveRequest['staffID'], array('fname', 'lname', 'prof'),false,false);
                if (is_array($staff)) {
                    // echo var_dump($staff) . "<br>";
                    $results[$key]['fname'] = $staff['fname'];
                    $results[$key]['lname'] = $staff['lname'];
                    $results[$key]['department'] = $staff['prof'];
                }
            }
        }
        return $results;
    }
    public function approveLeave($id)
    {
        $leaveInfo = $this->searchLeaveRequest(array('leaveType', 'staffID'), array('ID' => $id));
        if (!isset($leaveInfo)) {
            return false;
        }
        // 
        $leaveType = $leaveInfo['leaveType'];
        $sid = $leaveInfo['staffID'];

        $this->takeLeave($sid, $leaveType);

        $this->db->update('leaveregister', array('approve' => "T"), array('ID' => $id));

        return true;
    }
}
