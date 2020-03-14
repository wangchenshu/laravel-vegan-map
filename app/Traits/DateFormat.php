<?php

namespace App\Traits;

use App\Models\Enum\DateTimeEnum;
use DateTime;

trait DateFormat
{
    /**
     * 取得輸入日期, 當月的最後一天日期
     */
    public function getLastDayOfThisMonth($date)
    {
        return date("Y-m-t", strtotime($date));
    }

    /**
     * 取得輸入日期為星期幾
     */
    public function getWeekOfDate($date)
    {
        return date("w", strtotime($date));
    }

    /**
     * 轉換日期從西元到民國
     */
    public function commonEraToTaiwan($commonDate)
    {
        $taiwanDate = new DateTime($commonDate);
        $taiwanDate->modify("-1911 year");
        return  ltrim($taiwanDate->format("Y"), "0") . $taiwanDate->format("md");
    }

    /**
     * 回傳 輸入日期加上位移天數
     */
    public function addDays($date, $offset)
    {
        return  date('Y-m-d', strtotime($date . ' + ' . $offset . ' days'));
    }

    /**
     * 確認日期是否為當月的最後一週
     * 算法: 取出日期為星期幾, 用 7 扣掉該數字, 用該日期加上去,
     * 再判斷是否大於等於該月的最後一天的日期
     */
    public function isInLastWeek($date)
    {
        return $this->addDays(
            $date,
            DateTimeEnum::WEEK_MAX_NUM - $this->getWeekOfDate($date)
        ) >= $this->getLastDayOfThisMonth($date);
    }

    /**
     * 取得星期幾包含接下來的日期, 到月底.
     */
    public function getNDaysOfMonthOffsetWeek($date)
    {
        $dateArr = array();
        $lastDate = $this->getLastDayOfThisMonth($date);
        $offsetDate = $date;

        do {
            array_push($dateArr, $offsetDate);
            $offsetDate = $this->addDays(
                $offsetDate,
                DateTimeEnum::WEEK_MAX_NUM
            );
        } while ($offsetDate <= $lastDate);

        return $dateArr;
    }
}
