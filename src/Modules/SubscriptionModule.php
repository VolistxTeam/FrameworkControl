<?php

namespace Volistx\FrameworkControl\Modules;

use Carbon\Carbon;
use Volistx\FrameworkControl\Facades\Requests;

class SubscriptionModule
{
    private string $baseUrl;
    private string $token;

    public function __construct(string $baseUrl, string $token)
    {
        $this->baseUrl = $baseUrl.'/sys-bin/admin/subscriptions';
        $this->token = $token;
    }

    public function Create(int $userID, string $planID, \DateTime $activatedAt, \DateTime $expiresAt = null)
    {
        $dataArray = [
            'user_id'           => $userID,
            'plan_id'           => $planID,
            'plan_activated_at' => Carbon::instance($activatedAt)->format('Y-m-d H:i:s'),
        ];

        if ($expiresAt !== null) {
            $dataArray['plan_expires_at'] = Carbon::instance($expiresAt)->format('Y-m-d H:i:s');
        }

        return Requests::Post($this->baseUrl, $this->token, $dataArray);
    }

    public function Update(string $id, string $planID = null, \DateTime $activatedAt = null, \DateTime $expiresAt = null, string $hmacToken = null)
    {
        $dataArray = [];

        if ($planID !== null) {
            $dataArray['plan_id'] = $planID;
        }

        if ($activatedAt !== null) {
            $dataArray['plan_activated_at'] = Carbon::instance($activatedAt)->format('Y-m-d H:i:s');
        }

        if ($expiresAt !== null) {
            $dataArray['plan_expires_at'] = Carbon::instance($expiresAt)->format('Y-m-d H:i:s');
        }

        if ($expiresAt !== null) {
            $dataArray['hmac_token'] = $hmacToken;
        }

        return Requests::Put($this->baseUrl.'/'.$id, $this->token, $dataArray);
    }

    public function Delete(string $id)
    {
        return Requests::Delete($this->baseUrl.'/'.$id, $this->token, []);
    }

    public function Get(string $id)
    {
        return Requests::Get($this->baseUrl.'/'.$id, $this->token, []);
    }

    public function GetAll($page = 1, $limit = 50, $search = null)
    {
        $dataArray = [];
        $dataArray['page'] = $page;
        $dataArray['limit'] = $limit;

        if ($search !== null) {
            $dataArray['search'] = $search;
        }

        return Requests::Get($this->baseUrl, $this->token, $dataArray);
    }

    public function GetLogs($id, $page = 1, $limit = 50, $search = null)
    {
        $dataArray = [];
        $dataArray['page'] = $page;
        $dataArray['limit'] = $limit;

        if ($search !== null) {
            $dataArray['search'] = $search;
        }

        return Requests::Get($this->baseUrl.'/'.$id.'/logs', $this->token, $dataArray);
    }

    public function GetUsages($id, $date, $mode = null)
    {
        $dataArray = [];
        $dataArray['date'] = $date;

        if ($mode !== null) {
            $dataArray['mode'] = $mode;
        }

        return Requests::Get($this->baseUrl.'/'.$id.'/stats', $this->token, $dataArray);
    }
}
