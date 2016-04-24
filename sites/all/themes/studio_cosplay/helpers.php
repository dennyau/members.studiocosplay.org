<?php

function getNewEndDate($startTime, $subscriptionType) {
    // base case - do nothing
    $newEndDate = $startTime;

    // enum configuration maps to dateinterval spec constructor strings
    // http://php.net/manual/en/dateinterval.construct.php
    $subscriptionConfig = array(
        '30days' => 'P30D',
        '1year' => 'P1Y',
        '6months' => 'P6M'
    );

    // Make sure the enum exists
    if (array_key_exists($subscriptionType, $subscriptionConfig)){

        $increase = new DateInterval($subscriptionConfig[$subscriptionType]);

        // attempt blind addition
        $newEndDate->add($increase);

    } else {
        error_log("enum didn't exist!");
    }

    return $newEndDate;
}

function testing() {
    $test_cases = array(
        'The 30th' => array(
            'startdate' => '2016-04-30',
            'subType' => '30days'
        ),
        'Into New Year' => array(
            'startdate' => '2015-07-31',
            'subType' => '6months'
        ),
        'The 31st' => array(
            'startdate' => '2016-03-31',
            'subType' => '30days'
        ),
        'F29' => array(
            'startdate' => '2016-02-29',
            'subType' => '30days'
        ),
        'Leapyear' => array(
            'startdate' => '2016-02-15',
            'subType' => '30days'
        ),
        'Feb. starting' => array(
            'startdate' => '2015-02-15',
            'subType' => '30days'
        )
    );

    foreach ($test_cases as $testname => $testparams) {
        $enum = $testparams['subType'];
        $s = $testparams['startdate'];
        echo PHP_EOL.'*********'.PHP_EOL."$testname: $enum".PHP_EOL;
        $sDate = DateTime::createFromFormat('Y-m-d',$s);
        print_r($sDate);
        $eDate = getNewEndDate($sDate, $enum);
        print_r($eDate);
    }
}
date_default_timezone_set('America/New_York');
testing();
