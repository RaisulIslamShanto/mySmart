<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    public $login = [
        'email' => [
            'label'  => 'email',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Email Is Required',
            ],
        ],
        'password' => [
            'label'  => 'pasword',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Pasword Is Required',
            ],
        ],
    ];
    public $forgotValidate = [
        'user_email' => [
            'label'  => 'user_email',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Email Is Required',
            ],
        ],
    ];

    public $resetValidate = [
        'user_pass' => [
            'label'  => 'user_pass',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Password Is Required',
            ],
        ],
        're_pass' => [
            'label'  => 're_pass',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Confirm Password Is Required',
            ],
        ],
    ];
    public $popertyValidate = [
        'po_name' => [
            'label'  => 'ProductName',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Product Name Is Required',
            ],
        ],
        'po_streetads' => [
            'label'  => 'ProductStreetads',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Product Streetads Is Required',
            ],
        ],
        'po_city' => [
            'label'  => 'ProductCity',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Product City Is Required',
            ],
        ],
        'po_stateregion' => [
            'label'  => 'ProductStateregion',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Product Stateregion Is Required',
            ],
        ],
        'po_zip' => [
            'label'  => 'ProductZip',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Product Zip Is Required',
            ],
        ],
        'po_country' => [
            'label'  => 'ProductCountry',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Product Country Is Required',
            ],
        ],
        'image' => [
            'label'  => 'image',
            'rules'  => 'max_size[image,2048]',
            'errors' => [

                'max_size' => 'The size is too large',
            ],
        ],
    ];

    public $mailSmsValidate = [
        'mail_sub' => [
            'label'  => 'mail_sub',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Mail Subject Field Is Required',
            ],
        ],
        'mail_mess' => [
            'label'  => 'mail_mess',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Mail Message Field Is Required',
            ],
        ],
    ];
    public $floorValidate = [
        'floor_no' => [
            'label'  => 'Floor No',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Floor No Is Required',
            ],
        ],
    ];



    public $BankAccountValidate = [
        'holderName' => [
            'label'  => 'Account holders Name',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Account holders Name Is Required',
            ],
        ],
    ];


    public $demoValidate = [
        'amount' => [
            'label'  => 'Demo No',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Demo No Is Required',
            ],
        ],
    ];

    public $unitValidate = [
        'floor_id' => [
            'label'  => 'Floor',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Floor Is Required',
            ],
        ],
        'unit_no' => [
            'label'  => 'Unit',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Unit Is Required',
            ],
        ],
    ];
    public $tenantValidate = [
        'te_name' => [
            'label'  => 'te_name',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Tenant Name Is Required',
            ],
        ],
        'te_email' => [
            'label'  => 'te_email',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Eamil Is Required',
            ],
        ],
        'te_password' => [
            'label'  => 'te_password',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Tenant Password Is Required',
            ],
        ],
        'te_contrctno' => [
            'label'  => 'te_contrctno',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Tenant Contrctno Is Required',
            ],
        ],
        'te_ads' => [
            'label'  => 'te_ads',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Tenant Address Is Required',
            ],
        ],
        'te_nid' => [
            'label'  => 'te_nid',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Tenant NID Is Required',
            ],
        ],
        'floor_no' => [
            'label'  => 'Floor No',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Floor No Is Required',
            ],
        ],
        'unit_no' => [
            'label'  => 'Floor No',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Floor No Is Required',
            ],
        ],
        'te_advancerent' => [
            'label'  => 'Floor No',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Floor No Is Required',
            ],
        ],
        'te_rentpermonth' => [
            'label'  => 'Floor No',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Floor No Is Required',
            ],
        ],
        'te_issuedate' => [
            'label'  => 'Floor No',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Floor No Is Required',
            ],
        ],
        'te_rentmonth' => [
            'label'  => 'Floor No',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Floor No Is Required',
            ],
        ],
        'te_rentyear' => [
            'label'  => 'Floor No',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Floor No Is Required',
            ],
        ],
        'te_status' => [
            'label'  => 'Floor No',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Floor No Is Required',
            ],
        ],
    ];
    public $maintenanceValidate = [
        'main_date' => [
            'label'  => 'main_date',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Maintenance Date Is Required',
            ],
        ],
        'main_month' => [
            'label'  => 'main_month',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Maintenance Month Is Required',
            ],
        ],
        'main_year' => [
            'label'  => 'main_year',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Maintenance Year Is Required',
            ],
        ],
        'main_title' => [
            'label'  => 'main_title',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Maintenance Title Is Required',
            ],
        ],
        'main_amount' => [
            'label'  => 'main_amount',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Maintenance Amount Is Required',
            ],
        ],
        'main_details' => [
            'label'  => 'main_details',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Maintenance details Is Required',
            ],
        ],
    ];

    public $committeeValidate = [
        'm_membername' => [
            'label'  => 'm_membername',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Committee Member Name Is Required',
            ],
        ],
        'm_email' => [
            'label'  => 'm_email',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Committee Member Email Is Required',
            ],
        ],
        'm_password' => [
            'label'  => 'm_password',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Committee Member Password Is Required',
            ],
        ],
        'm_phone' => [
            'label'  => 'm_phone',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Committee Member Phone Is Required',
            ],
        ],
        'm_presentads' => [
            'label'  => 'm_presentads',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Committee Member Present Address Is Required',
            ],
        ],
        'm_permanentads' => [
            'label'  => 'm_permanentads',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Committee Member Permanent Address Is Required',
            ],
        ],
        'm_nid' => [
            'label'  => 'm_nid',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Committee Member NID Is Required',
            ],
        ],
        'm_designation' => [
            'label'  => 'm_designation',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Committee Member Designation Is Required',
            ],
        ],
        'm_joiningdate' => [
            'label'  => 'm_joiningdate',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Committee Member Joining Date Is Required',
            ],
        ],
        // 'm_endingdate' => [
        //     'label'  => 'main_details',
        //     'rules'  => 'required',
        //     'errors' => [
        //         'required' => 'Maintenance details Is Required',
        //     ],
        // ],
        // 'm_staus' => [
        //     'label'  => 'main_details',
        //     'rules'  => 'required',
        //     'errors' => [
        //         'required' => 'Maintenance details Is Required',
        //     ],
        // ],
    ];

    public $visitorValidate = [
        'visi_entrydate' => [
            'label'  => 'visi_entrydate',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Visitor Entry Date Is Required',
            ],
        ],
        'visi_name' => [
            'label'  => 'visi_name',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Visitor Name Is Required',
            ],
        ],
        'visi_mobile' => [
            'label'  => 'visi_mobile',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Visitor Mobile Number Is Required',
            ],
        ],
        'visi_ads' => [
            'label'  => 'visi_ads',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Visitor Address Is Required',
            ],
        ],
        'floor_id' => [
            'label'  => 'floor_id',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Visitor Floor No Is Required',
            ],
        ],
        'unit_id' => [
            'label'  => 'unit_id',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Visitor Unit No Is Required',
            ],
        ],
        'visi_intime' => [
            'label'  => 'visi_intime',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Visitor In Time Is Required',
            ],
        ],
        'visi_outtime' => [
            'label'  => 'visi_outtime',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Visitor Out Time Is Required',
            ],
        ],
    ];

    public $complainValidate = [
        'com_title' => [
            'label'  => 'com_title',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Complain Title Is Required',
            ],
        ],
        'com_description' => [
            'label'  => 'com_description',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Complain Description Is Required',
            ],
        ],
        'com_date' => [
            'label'  => 'com_date',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Complain Date Is Required',
            ],
        ],
        // 'com_status' => [
        //     'label'  => 'com_status',
        //     'rules'  => 'required',
        //     'errors' => [
        //         'required' => 'Complain Status Is Required',
        //     ],
        // ],
        // 'com_solution' => [
        //     'label'  => 'com_solution',
        //     'rules'  => 'required',
        //     'errors' => [
        //         'required' => 'Complain Solution Is Required',
        //     ],
        // ],
    ];

    public $meetingValidate = [
        'mee_issuedate' => [
            'label'  => 'mee_issuedate',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Meeting Issuedate Is Required',
            ],
        ],
        'mee_title' => [
            'label'  => 'mee_title',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Meeting Title Is Required',
            ],
        ],
        'mee_description' => [
            'label'  => 'mee_description',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Meeting description Is Required',
            ],
        ],
    ];

    public $billSetupValidate = [
        'bill_type' => [
            'label'  => 'bill_type',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Bill Type Setup Is Required',
            ],
        ],
    ];
    public $utilitySetupValidate = [
        'gas_bill' => [
            'label'  => 'gas_bill',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Gas Bill Per Flat Is Required',
            ],
        ],
        'security_bill' => [
            'label'  => 'security_bill',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Security Bill Per Flat Is Required',
            ],
        ],
    ];
    public $memberSetupValidate = [
        'member_type' => [
            'label'  => 'member_type',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Member Type Setup Is Required',
            ],
        ],
    ];
    public $monthSetupValidate = [
        'month_name' => [
            'label'  => 'month_name',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Month Name Is Required',
            ],
        ],
    ];

    public $tenantReportValidate = [
        'te_status' => [
            'label'  => 'te_status',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Tenanat Status Field Is Required',
            ],
        ],
    ];
    public $unitReportValidate = [
        'unit_status' => [
            'label'  => 'unit_status',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Unit Status Field Is Required',
            ],
        ],
    ];

    ////////// shukriti

    public $owner = [
        'name'       => 'required|min_length[1]|max_length[40]',
        'email'      => 'valid_email',
        'password'   => 'required|min_length[2]|max_length[16]',
        'contact_no' => 'required|max_length[20]',
        'present_address' => 'required|max_length[50]',
        'parmanent_address' => 'required|max_length[50]',
        'nid' => 'required|max_length[20]',
        'ChkOwnerUnit' => 'required',
        //'image' => 'ext_in[image,png,PNG,jpg,gif]|max_size[image,10240]',
    ];

    public $owner_errors = [
        'name' => [
            'required'   => 'Sorry! name is required.',
            'min_length' => 'sorry! at least place 3 character.',
        ],
        'email'  => [

            'valid_email' => 'Sorry! a valid email is required',
        ],
        'password' => [
            'required'   => 'sorry! password is required.',
            'min_length' => 'sorry! at least place 8 character.',
            'max_length' => 'sorry! your password is longer than 16.',
        ],
        'contact_no' => [
            'required'   => 'sorry! contact_no is required.',
        ],
        'present_address' => [
            'required'   => 'This input field is required.',
            'min_length' => 'sorry at least place 4 character.',
        ],
        'parmanent_address' => [
            'required'   => 'This input field is required.',
            'min_length' => 'sorry at least place 4 character.',
        ],
        'nid' => [
            'required'   => 'This input field is required.',
            'min_length' => 'sorry at least place 4 character.',
        ],
        'ChkOwnerUnit' => [
            'required'   => 'This input field is required.',
            'min_length' => 'sorry at least place 4 character.',
        ],
        // 'image'  => [
        //     'ext_in'     => 'this image type not support',
        //     'max_size'   => 'This image is too large.',
        // ],
    ];


    public $ownerutility = [
        'floor_no'       => 'required',
        'unit_no'      => 'required',
        'month'   => 'required',
        'year' => 'required',
        'issue_date' => 'required'
    ];
    public $ownerutility_errors = [
        'floor_no' => [
            'required'   => 'Sorry! Floor is required.'
        ],
        'unit_no'  => [

            'valid_email' => 'Sorry! Unit is required',
        ],
        'month' => [
            'required'   => 'sorry! Month is required.'
        ],
        'year' => [
            'required'   => 'sorry! Year is required.',
        ],
        'issue_date' => [
            'required'   => 'sorry! Issue Date is required.',
        ]
    ];

    public $billdeposit = [
        'bill_type'       => 'required',
        'bill_date'      => 'required',
        'month'   => 'required',
        'year' => 'required',
        'total_amount' => 'required',
        'bank_name' => 'required',
        'details' => 'required',
    ];

    public $billdeposit_errors = [
        'bill_type' => [
            'required'   => 'Sorry! Bill type is required.'
        ],
        'bill_date'  => [

            'required' => 'Sorry! Bill date is required',
        ],
        'month' => [
            'required'   => 'sorry! Month is required.',
        ],
        'year' => [
            'required'   => 'sorry! Year is required.',
        ],
        'total_amount' => [
            'required'   => 'sorry! Total amount is required.',
        ],
        'bank_name' => [
            'required'   => 'sorry! Bank name is required.',
        ],
        'details' => [
            'required'   => 'sorry! details is required.',
        ]
    ];
    public $fund = [
        'owner_name'       => 'required',
        'month'      => 'required',
        'year'   => 'required',
        'issue_date' => 'required',
        'total_amount' => 'required',
        'purpose' => 'required',
    ];
    public $fund_errors = [
        'owner_name' => [
            'required'   => 'Sorry! Owner name is required.'
        ],
        'month'  => [

            'required' => 'Sorry! Month is required',
        ],
        'year' => [
            'required'   => 'sorry! Year is required.',
        ],
        'issue_date' => [
            'required'   => 'sorry! Issue Date is required.',
        ],
        'total_amount' => [
            'required'   => 'sorry! Total amount is required.',
        ],
        'purpose' => [
            'required'   => 'sorry! Purpose is required.',
        ],
    ];

    public $employee = [
        'name'       => 'required',
        'email'      => 'valid_email',
        'password'   => 'required',
        'contact_no' => 'required',
        'present_address' => 'required',
        'parmanent_address' => 'required',
        'nid' => 'required',
        'designation' => 'required',
        'join_date' => 'required',
        'end_date' => 'required',
        'salary_per_month' => 'required',
        'status' => 'required',
        // 'image' => 'required',
    ];
    public $employee_errors = [
        'name' => [
            'required'   => 'Sorry! Name is required.'
        ],
        'email'  => [

            'valid_email' => 'Sorry! a valid email is required',
        ],
        'password' => [
            'required'   => 'sorry! Password is required.',
        ],
        'contact_no' => [
            'required'   => 'sorry! Contact no is required.',
        ],
        'present_address' => [
            'required'   => 'sorry! Present address is required.',
        ],
        'parmanent_address' => [
            'required'   => 'sorry! Parmanent address is required.',
        ],
        'nid' => [
            'required'   => 'sorry! Nid is required.',
        ],
        'designation' => [
            'required'   => 'sorry! Designation is required.',
        ],
        'join_date' => [
            'required'   => 'sorry! Join date is required.',
        ],
        'end_date' => [
            'required'   => 'sorry! End date is required.',
        ],
        'salary_per_month' => [
            'required'   => 'sorry! Salary Field is required.',
        ],
        'status' => [
            'required'   => 'sorry! Status is required.',
        ],
        // 'image' => [
        //     'required'   => 'sorry! Image is required.',
        // ],
    ];
    public $employeesalary = [
        'employee_name'       => 'required',
        'designation2'   => 'required',
        'month' => 'required',
        'year' => 'required',
        'salary_per_month'   => 'required',
        'issue_date' => 'required',
    ];
    public $employeesalary_errors = [
        'employee_name' => [
            'required'   => 'Sorry! Name is required.'
        ],
        'designation2' => [
            'required'   => 'sorry! Designation is required.',
        ],
        'month' => [
            'required'   => 'sorry! Month no is required.',
        ],
        'year' => [
            'required'   => 'sorry! Year address is required.',
        ],
        'salary_per_month' => [
            'required'   => 'sorry! Salary field address is required.',
        ],
        'issue_date' => [
            'required'   => 'sorry! Issue Date is required.',
        ],
    ];
    public $notice = [
        'title' => 'required',
        'date'   => 'required',
        'status' => 'required',
        'notice_type' => 'required',
        'text_area'   => 'required',
    ];
    public $notice_errors = [
        'title' => [
            'required'   => 'Sorry! Title is required.'
        ],
        'date' => [
            'required'   => 'sorry! Date is required.',
        ],
        'status' => [
            'required'   => 'sorry! Status is required.',
        ],
        'notice_type' => [
            'required'   => 'sorry! Notice type address is required.',
        ],
        'text_area' => [
            'required'   => 'sorry! This field address is required.',
        ],
    ];
    public $rent = [
        'floor_name'       => 'required',
        'unit_no'       => 'required',
        'month'       => 'required',
        'year'       => 'required',
        'renter_name'       => 'required',
        'rent'       => 'required',
        'total_rent'      => 'required',
        'issue_date'   => 'required',
        'bill_paid_date' => 'required',
        'bill_status' => 'required'
    ];

    public $rent_errors = [
        'floor_name' => [
            'required'   => 'Sorry! Floor name is required.'
        ],
        'unit_no' => [
            'required'   => 'sorry! Unit is required.',
        ],
        'month' => [
            'required'   => 'sorry! Month is required.',
        ],
        'year' => [
            'required'   => 'sorry! Year is required.',
        ],
        'renter_name' => [
            'required'   => 'sorry! Renter name is required.',
        ],
        'rent' => [
            'required'   => 'sorry! Rent is required.',
        ],
        'total_rent' => [
            'required'   => 'sorry! Total rent is required.',
        ],
        'issue_date' => [
            'required'   => 'sorry! Issue date is required.',
        ],
        'bill_paid_date' => [
            'required'   => 'sorry! Bill paid date is required.',
        ],
        'bill_status' => [
            'required'   => 'sorry! Bill status is required.',
        ],
    ];
    public $user = [
        'email'       => 'valid_email',
        'name'       => 'required',
        'contact_no'       => 'required',
        'password'       => 'required',
        'branch'       => 'required',
        'user_type'       => 'required',
        // 'image'      => 'required',
        // 'issue_date'   => 'required',
        // 'bill_paid_date' => 'required',
        // 'bill_status' => 'required'
    ];
    public $user_errors = [
        'email' => [
            'valid_email'   => 'Sorry! a valid email is required.'
        ],
        'name' => [
            'required'   => 'sorry! Name is required.',
        ],
        'contact_no' => [
            'required'   => 'sorry! Contact no is required.',
        ],
        'password' => [
            'required'   => 'sorry! Password is required.',
        ],
        'branch' => [
            'required'   => 'sorry! Branch is required.',
        ],
        'user_type' => [
            'required'   => 'sorry! Type is required.',
        ],

        // 'image'      => 'required',

    ];
    public $year = [
        'year'       => 'required',
    ];
    public $year_errors = [
        'year' => [
            'required'   => 'Sorry! Year is required.'
        ],

    ];
    public $currency = [
        'symbol'       => 'required',
        'name'       => 'required',
    ];
    public $currency_errors = [
        'symbol' => [
            'required'   => 'Sorry! Symbol is required.'
        ],
        'name' => [
            'required'   => 'Sorry! Nmae is required.'
        ],

    ];

    public $currencysett = [
        'currency'       => 'required',
        'currency_separator'       => 'required',
        'currency_position'       => 'required',
        'currency_decimal'       => 'required',
    ];
    public $currencysett_errors = [
        'currency' => [
            'required'   => 'Sorry! Currency is required.'
        ],
        'currency_separator' => [
            'required'   => 'Sorry! Currency separator is required.'
        ],
        'currency_position' => [
            'required'   => 'Sorry! Currency position is required.'
        ],
        'currency_decimal' => [
            'required'   => 'Sorry! Currency decimal is required.'
        ],

    ];
    public $language = [
        'language'       => 'required',
    ];
    public $language_errors = [
        'language' => [
            'required'   => 'Sorry! Language is required.'
        ],

    ];

    public $emailsetting = [
        'mail_option'       => 'required',
        'smtp_hostname'       => 'required',
        'smtp_username'       => 'required',
        'smtp_password'       => 'required',
        'smtp_post'       => 'required',
        'smtp_secure'       => 'required',
    ];
    public $emailsetting_errors = [
        'mail_option' => [
            'required'   => 'Sorry! Currency is required.'
        ],
        'smtp_hostname' => [
            'required'   => 'Sorry! Currency separator is required.'
        ],
        'smtp_username' => [
            'required'   => 'Sorry! Currency position is required.'
        ],
        'smtp_password' => [
            'required'   => 'Sorry! Currency decimal is required.'
        ],
        'smtp_post' => [
            'required'   => 'Sorry! Currency position is required.'
        ],
        'smtp_post' => [
            'required'   => 'Sorry! Currency decimal is required.'
        ],

    ];
    public $smssetting = [
        'clickAtell_username'       => 'required',
        'clickAtell_password'       => 'required',
        'clickAtell_api_key'       => 'required',
    ];
    public $smssetting_errors = [
        'clickAtell_username' => [
            'required'   => 'Sorry! Currency is required.'
        ],
        'clickAtell_password' => [
            'required'   => 'Sorry! Currency separator is required.'
        ],
        'clickAtell_api_key' => [
            'required'   => 'Sorry! Currency position is required.'
        ],

    ];

    public $role = [
        'role_name'       => 'required',
    ];
    public $role_errors = [
        'role_name' => [
            'required'   => 'Sorry! Role name is required.'
        ],

    ];

    public $date = [
        'date_format'       => 'required',
    ];
    public $date_errors = [
        'date_format' => [
            'required'   => 'Sorry! Date format is required.'
        ],
        'date_format' => [
            'required'   => 'Sorry! Date format is required.'
        ],
        'date_format' => [
            'required'   => 'Sorry! Date format is required.'
        ],
        'date_format' => [
            'required'   => 'Sorry! Date format is required.'
        ],

    ];

    public $register = [
        'username'       => 'required',
        'useremail'       => 'valid_email',
        'userpassword'       => 'required|min_length[8]',
        'confirm_pass'       => 'required|min_length[8]',
        'term_and_condition'       => 'required',

    ];
    public $register_errors = [
        'username' => [
            'required'   => 'Sorry! User Name is required.'
        ],
        'useremail' => [
            'required'   => 'Sorry! Date format is required.'
        ],
        'userpassword' => [
            'required'   => 'Sorry! Password is required.',
            'min_length'   => 'Sorry! Password at least 8 character'
        ],
        'confirm_pass' => [
            'required'   => 'Sorry! Confirm Password is required.',
            'min_length'   => 'Sorry! Confirm Password at least 8 character'
        ],
        'term_and_condition' => [
            'required'   => 'Sorry! Term and Condition is required.'
        ],


    ];

    public $superuser = [
        'email'       => 'valid_email',
        'name'       => 'required',
        'contact_no'       => 'required',
        'password'       => 'required',
        'branch'       => 'required',
    ];
    public $superuser_errors = [
        'email' => [
            'valid_email'   => 'Sorry! a valid email is required.'
        ],
        'name' => [
            'required'   => 'sorry! Name is required.',
        ],
        'contact_no' => [
            'required'   => 'sorry! Contact no is required.',
        ],
        'password' => [
            'required'   => 'sorry! Password is required.',
        ],
        'branch' => [
            'required'   => 'sorry! Branch is required.',
        ],

        // 'image'      => 'required',

    ];

    public $pakage = [
        'pakage_title'       => 'required',
        'pakage_objective'       => 'required',
        'duration'       => 'required',
        'cost'       => 'required',
        'property_limit'       => 'required',
        'employee_limit'       => 'required',
    ];
    public $pakage_errors = [
        'pakage_title' => [
            'required'   => 'Sorry! a Pakage Title  is required.'
        ],
        'pakage_objective' => [
            'required'   => 'sorry! Pakage Objective is required.',
        ],
        'duration' => [
            'required'   => 'sorry! Duration no is required.',
        ],
        'cost' => [
            'required'   => 'sorry! Cost is required.',
        ],
        'property_limit' => [
            'required'   => 'sorry! Property Limit is required.',
        ],
        'employee_limit' => [
            'required'   => 'sorry! Property Limit is required.',
        ],

    ];

    public $stripe = [
        'stripe_mode'       => 'required',
        'stripe_api_key'       => 'required',
        'stripe_test_api_key'       => 'required',
        'stripe_serect_key'       => 'required',
        'stripe_test_serect_key'       => 'required',
        'status'       => 'required',
    ];

    public $stripe_errors = [
        'stripe_mode' => [
            'required'   => 'Sorry! Stripe Mode is Required.'
        ],
        'stripe_api_key' => [
            'required'   => 'Sorry! Stripe Line Api Key is Required.'
        ],
        'stripe_test_api_key' => [
            'required'   => 'Sorry! Stripe Test Api Key is Required.'
        ],
        'stripe__test_api_key' => [
            'required'   => 'Sorry! Stripe Api Key is Required.'
        ],
        'stripe_serect_key' => [
            'required'   => 'Sorry! Stripe Serect Key is Required.'
        ],
        'stripe_test_serect_key' => [
            'required'   => 'Sorry! Stripe Test Serect Key is Required.'
        ],
        'status' => [
            'required'   => 'Sorry! Status is Required.'
        ],
    ];

    public $useradd = [
        'username'       => 'required',
        'useremail'       => 'valid_email',
        'userpassword'       => 'required|min_length[8]',
        'confirm_pass'       => 'required|min_length[8]',
        'user_type'       => 'required',
        'package_id'       => 'required',

    ];
    public $useradd_errors = [
        'username' => [
            'required'   => 'Sorry! User Name is required.'
        ],
        'useremail' => [
            'required'   => 'Sorry! Date format is required.'
        ],
        'userpassword' => [
            'required'   => 'Sorry! Password is required.',
            'min_length'   => 'Sorry! Password at least 8 character'
        ],
        'confirm_pass' => [
            'required'   => 'Sorry! Confirm Password is required.',
            'min_length'   => 'Sorry! Confirm Password at least 8 character'
        ],
        'user_type' => [
            'required'   => 'Sorry! User Type is required.'
        ],
        'package_id' => [
            'required'   => 'Sorry! Package is required.'
        ],
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    // public $templates = [
    //     'list'   => 'CodeIgniter\Validation\Views\list',
    //     'single' => 'CodeIgniter\Validation\Views\single',
    // ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
}
