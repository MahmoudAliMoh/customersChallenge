<?php

namespace App\Http\Transformers\Customers;

class CustomersTransformer
{
    public function transform($customers, $countries): array
    {
        $mappedNumbers = [];

        foreach ($customers as $customer) {
            list($code, $number) = explode(' ', $customer['phone']);
            $phoneCode = str_replace(array('(', ')'), '', $code);

            foreach ($countries as $country) {
                if ($country['code'] == $phoneCode) {
                    $map['country_id'] = $country['id'];
                    $map['country'] = $country['name'];
                    $map['code'] = $phoneCode;
                    $map['phone'] = $number;
                    array_push($mappedNumbers, $map);
                }
            }
        }

        return $mappedNumbers;
    }
}
