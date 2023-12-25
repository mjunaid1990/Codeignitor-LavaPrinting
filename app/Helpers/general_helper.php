<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function get_day_interval() {
    $time = date("H");
    /* Set the $timezone variable to become the current timezone */
    $timezone = date("e");
    /* If the time is less than 1200 hours, show good morning */
    if ($time < "12") {
        return "Good Morning";
    } else
    /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
    if ($time >= "12" && $time < "17") {
        return "Good Afternoon";
    } else
    /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
    if ($time >= "17" && $time < "19") {
        return "Good Evening";
    } else
    /* Finally, show good night if the time is greater than or equal to 1900 hours */
    if ($time >= "19") {
        return "Good Night";
    }
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

/**
 * Timezones list with GMT offset
 *
 * @return array
 * @link http://stackoverflow.com/a/9328760
 */
function timezone_list() {
    $zones_array = array();
    $timestamp = time();
    foreach (timezone_identifiers_list() as $key => $zone) {
        date_default_timezone_set($zone);
        $zones_array[$key]['zone'] = $zone;
        $zones_array[$key]['diff_from_GMT'] = 'UTC/GMT ' . date('P', $timestamp);
    }
    return $zones_array;
}

/**
 * Generate md5 hash
 * @return string
 */
function app_generate_hash() {
    return md5(rand() . microtime() . time() . uniqid());
}

/**
 * Generate table data
 * @return string
 */
function get_table_data($table, $params = []) {
    $hook_data = [
        'table' => $table,
        'params' => $params,
    ];

    foreach ($hook_data['params'] as $key => $val) {
        $$key = $val;
    }

    $table = $hook_data['table'];

    $path = APPPATH . 'Views/admin/tables/' . $table . '.php';

    include_once($path);
    echo json_encode($output);
    die;
}

function data_tables_init($aColumns, $sIndexColumn, $sTable, $join = [], $where = [], $additionalSelect = [], $sGroupBy = '', $searchAs = []) {
    $request = \Config\Services::request();
    $__post = $request->getPost();
    $havingCount = '';
    /*
     * Paging
     */
    $sLimit = '';

    if ((is_numeric($request->getPost('start'))) && $request->getPost('length') != '-1') {
        $sLimit = 'LIMIT ' . intval($request->getPost('start')) . ', ' . intval($request->getPost('length'));
    }
    $_aColumns = [];
    foreach ($aColumns as $column) {
        // if found only one dot
        if (substr_count($column, '.') == 1 && strpos($column, ' as ') === false) {
            $_column = explode('.', $column);
            if (isset($_column[1])) {
                if (_startsWith($_column[0], 'tbl')) {
                    $_prefix = prefixed_table_fields_wildcard($_column[0], $_column[0], $_column[1]);
                    array_push($_aColumns, $_prefix);
                } else {
                    array_push($_aColumns, $column);
                }
            } else {
                array_push($_aColumns, $_column[0]);
            }
        } else {
            array_push($_aColumns, $column);
        }
    }

    /*
     * Ordering
     */
    $dueDateColumns = [];
    $sOrder = '';

    if ($request->getPost('order')) {
        $sOrder = 'ORDER BY ';
        foreach ($request->getPost('order') as $key => $val) {
            $columnName = $aColumns[intval($__post['order'][$key]['column'])];
            $dir = strtoupper($__post['order'][$key]['dir']);
            if (strpos($columnName, ' as ') !== false) {
                $columnName = strbefore($columnName, ' as');
            }

            // first checking is for eq tablename.column name
            // second checking there is already prefixed table name in the column name
            // this will work on the first table sorting - checked by the draw parameters
            // in future sorting user must sort like he want and the duedates won't be always last
            if ((in_array($sTable . '.' . $columnName, $dueDateColumns) || in_array($columnName, $dueDateColumns))
            ) {
                $sOrder .= $columnName . ' IS NULL ' . $dir . ', ' . $columnName;
            } else {
                $r = str_replace(array($sTable,'.'), '', $columnName);
                $sOrder .= $sTable.'.'.$r;
            }
            $sOrder .= ' ' . $dir . ', ';
        }


        if (trim($sOrder) == 'ORDER BY') {
            $sOrder = '';
        }
        $sOrder = rtrim($sOrder, ', ');

        
    }

    /*
     * Filtering
     * NOTE this does not match the built-in DataTables filtering which does it
     * word by word on any field. It's possible to do here, but concerned about efficiency
     * on very large tables, and MySQL's regex functionality is very limited
     */
    $sWhere = '';
    if ((isset($__post['search'])) && $__post['search']['value'] != '') {
        $search_value = $__post['search']['value'];
        $search_value = trim($search_value);
        $sWhere = 'WHERE (';
        for ($i = 0; $i < count($aColumns); $i++) {
            $columnName = $aColumns[$i];
            if (strpos($columnName, ' as ') !== false) {
                $columnName = strbefore($columnName, ' as');
            }
            if (stripos($columnName, 'AVG(') !== false || stripos($columnName, 'SUM(') !== false) {
                
            } else {
                if (($__post['columns'][$i]) && $__post['columns'][$i]['searchable'] == 'true') {
                    if (isset($searchAs[$i])) {
                        $columnName = $searchAs[$i];
                    }
                    $sWhere .= 'convert(' . $columnName . ' USING utf8)' . " LIKE '%" . $search_value . "%' OR ";
                }
            }
        }
        if (count($additionalSelect) > 0) {
            foreach ($additionalSelect as $searchAdditionalField) {
                if (strpos($searchAdditionalField, ' as ') !== false) {
                    $searchAdditionalField = strbefore($searchAdditionalField, ' as');
                }
                if (stripos($columnName, 'AVG(') !== false || stripos($columnName, 'SUM(') !== false) {
                    
                } else {
                    // Use index
                    $sWhere .= 'convert(' . $searchAdditionalField . ' USING utf8)' . " LIKE '" . $search_value . "%' OR ";
                }
            }
        }
        $sWhere = substr_replace($sWhere, '', -3);
        $sWhere .= ')';
    } else {
        // Check for custom filtering
        $searchFound = 0;
        $sWhere = 'WHERE (';
        for ($i = 0; $i < count($aColumns); $i++) {
            if (isset($__post['columns'][$i]) && ($__post['columns'][$i]) && $__post['columns'][$i]['searchable'] == 'true') {
                $search_value = $__post['columns'][$i]['search']['value'];

                $columnName = $aColumns[$i];
                if (strpos($columnName, ' as ') !== false) {
                    $columnName = strbefore($columnName, ' as');
                }
                if ($search_value != '') {
                    $sWhere .= 'convert(' . $columnName . ' USING utf8)' . " LIKE '%" . $search_value . "%' OR ";
                    if (count($additionalSelect) > 0) {
                        foreach ($additionalSelect as $searchAdditionalField) {
                            $sWhere .= 'convert(' . $searchAdditionalField . ' USING utf8)' . " LIKE '" . $search_value . "%' OR ";
                        }
                    }
                    $searchFound++;
                }
            }
        }
        if ($searchFound > 0) {
            $sWhere = substr_replace($sWhere, '', -3);
            $sWhere .= ')';
        } else {
            $sWhere = '';
        }
    }

    /*
     * SQL queries
     * Get data to display
     */
    $_additionalSelect = '';
    if (count($additionalSelect) > 0) {
        $_additionalSelect = ',' . implode(',', $additionalSelect);
    }
    $where = implode(' ', $where);
    if ($sWhere == '') {
        $where = trim($where);
        if (_startsWith($where, 'AND') || _startsWith($where, 'OR')) {
            if (_startsWith($where, 'OR')) {
                $where = substr($where, 2);
            } else {
                $where = substr($where, 3);
            }
            $where = 'WHERE ' . $where;
        }
    }

    $join = implode(' ', $join);

    $sQuery = '
    SELECT SQL_CALC_FOUND_ROWS ' . str_replace(' , ', ' ', implode(', ', $_aColumns)) . ' ' . $_additionalSelect . "
    FROM $sTable
    " . $join . "
    $sWhere
    " . $where . "
    $sGroupBy
    $sOrder
    $sLimit
    ";

    
    $db = \Config\Database::connect();
    // echo $sQuery;exit;
    $rResult = $db->query($sQuery)->getResultArray();

    $hookData = [
        'results' => $rResult,
        'table' => $sTable,
        'limit' => $sLimit,
        'order' => $sOrder,
    ];

    $rResult = $hookData['results'];

    /* Data set length after filtering */
    $sQuery = '
    SELECT FOUND_ROWS()
    ';
    $_query = $db->query($sQuery)->getResultArray();
    $iFilteredTotal = $_query[0]['FOUND_ROWS()'];

    if (_startsWith($where, 'AND')) {
        $where = 'WHERE ' . substr($where, 3);
    }
    /* Total data set length */
    $sQuery = '
    SELECT COUNT(' . $sTable . '.' . $sIndexColumn . ")
    FROM $sTable " . $join . ' ' . $where;


    
    $_query = $db->query($sQuery)->getResultArray();
    $iTotal = $_query[0]['COUNT(' . $sTable . '.' . $sIndexColumn . ')'];
    /*
     * Output
     */
    $output = [
        'draw' => $__post['draw'] ? intval($__post['draw']) : 0,
        'iTotalRecords' => $iTotal,
        'iTotalDisplayRecords' => $iFilteredTotal,
        'aaData' => [],
    ];

    return [
        'rResult' => $rResult,
        'output' => $output,
    ];
}

/**
 * String starts with
 * @param  string $haystack
 * @param  string $needle
 * @return boolean
 */
if (!function_exists('_startsWith')) {

    function _startsWith($haystack, $needle) {
        // search backwards starting from haystack length characters from the end
        return $needle === '' || strrpos($haystack, $needle, -strlen($haystack)) !== false;
    }

}

if (!function_exists('strbefore')) {

    /**
     * Get string before specific charcter/word
     * @param  string $string    string from where to get
     * @param  substring $substring search for
     * @return string
     */
    function strbefore($string, $substring) {
        return App\Helpers\Str::before($string, $substring);
    }

}

function get_logged_in_user() {
    $session = \Config\Services::session();
    $user = $session->get('current_user');
    if ($user) {
        return $user;
    }
    return false;
}

function csvstring_to_array($string, $separatorChar = ',', $enclosureChar = '"', $newlineChar = "\n") {
    // @author: Klemen Nagode
    $array = array();
    $size = strlen($string);
    $columnIndex = 0;
    $rowIndex = 0;
    $fieldValue = "";
    $isEnclosured = false;
    for ($i = 0; $i < $size; $i++) {

        $char = $string[$i];
        $addChar = "";

        if ($isEnclosured) {
            if ($char == $enclosureChar) {

                if ($i + 1 < $size && $string[$i + 1] == $enclosureChar) {
                    // escaped char
                    $addChar = $char;
                    $i++; // dont check next char
                } else {
                    $isEnclosured = false;
                }
            } else {
                $addChar = $char;
            }
        } else {
            if ($char == $enclosureChar) {
                $isEnclosured = true;
            } else {

                if ($char == $separatorChar) {

                    $array[$rowIndex][$columnIndex] = $fieldValue;
                    $fieldValue = "";

                    $columnIndex++;
                } elseif ($char == $newlineChar) {
                    echo $char;
                    $array[$rowIndex][$columnIndex] = $fieldValue;
                    $fieldValue = "";
                    $columnIndex = 0;
                    $rowIndex++;
                } else {
                    $addChar = $char;
                }
            }
        }
        if ($addChar != "") {
            $fieldValue .= $addChar;
        }
    }

    if ($fieldValue) { // save last field
        $array[$rowIndex][$columnIndex] = $fieldValue;
    }
    return $array;
}

function alphabets_array() {
    return array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
}

function languages() {
    return [
        'en' => 'English',
        'fr' => 'Français',
        'es' => 'Español',
        'de' => 'Deutsch',
        'it' => 'Italiano',
    ];
}

function roles() {
    return [
        1 => 'Admin',
        2 => 'Sponsor',
        3 => 'Invitee',
    ];
}

function get_language_name($v) {
    $languages = languages();
    foreach ($languages as $k => $lang) {
        if ($k == $v) {
            return $lang;
            exit();
        }
    }
}

function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

function site_url_with_lang() {
    $session = \Config\Services::session();
    $lang = $session->get('language');
    return base_url() . '/' . $lang;
}

if (!function_exists('to_slug')) {

    function to_slug($string, $separator = '-') {
        $re = "/(\\s|\\" . $separator . ")+/mu";
        $str = @trim($string);
        $subst = $separator;
        $result = preg_replace($re, $subst, $str);
        $result = str_replace('-&-', '-', $result);
        return mb_strtolower($result, mb_detect_encoding($result));
    }

}

if (!function_exists('to_db_slug')) {

    function to_product_slug($string, $separator = '-') {
        $re = "/(\\s|\\" . $separator . ")+/mu";
        $str = @trim($string);
        $subst = $separator;
        $result = preg_replace($re, $subst, $str);
        $result = str_replace('-&-', '-', $result);
        $slug = mb_strtolower($result, mb_detect_encoding($result));
        $db = \Config\Database::connect();
        $builder = $db->table('products');
        $builder->where('slug', $slug);
        $rows = $builder->get()->getResult();
        if (!empty($rows)) {
            $slug = $slug . '-' . count($rows);
        }
        return $slug;
    }

}

function handle_image_upload($id, $name, $table, $path = '/uploads/') {
    $request = \Config\Services::request();
    $path = WRITEPATH . $path . $id;
    _maybe_create_upload_path($path);
    $image = $request->getFile($name);
    if ($image) {
        if ($image->isValid() && !$image->hasMoved()) {
            $imgName = $image->getClientName();
            $newName = str_replace(' ', '-', $imgName);
            $image->move($path, $newName);
            $db = \Config\Database::connect();
            $builder = $db->table($table);
            $builder->update([$name => $newName], ['id' => $id]);
        }
    }
}

function handle_multiple_upload($id, $name, $table) {
    $request = \Config\Services::request();
    $db = \Config\Database::connect();
    $path = WRITEPATH . '/uploads/products/' . $id;
    _maybe_create_upload_path($path);
    $images = $request->getFiles();
    if ($images) {
        foreach ($images[$name] as $image) {

            if ($image->isValid() && !$image->hasMoved()) {
                $imgName = $image->getClientName();
                $newName = str_replace(' ', '-', $imgName);
                $image->move($path, $newName);
                $builder = $db->table($table);
                $data = [
                    'product_id' => $id,
                    'image' => $newName
                ];
                $builder->insert($data);
            }
        }
    }
}

/**
 * Check if path exists if not exists will create one
 * This is used when uploading files
 * @param  string $path path to check
 * @return null
 */
function _maybe_create_upload_path($path) {
    if (!file_exists($path)) {
        mkdir($path);
    }
}

/**
 * Delete directory
 * @param  string $dirPath dir
 * @return boolean
 */
function delete_dir($dirPath) {
    if (!is_dir($dirPath)) {
        throw new InvalidArgumentException("$dirPath must be a directory");
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            delete_dir($file);
        } else {
            unlink($file);
        }
    }
    if (rmdir($dirPath)) {
        return true;
    }

    return false;
}

function get_blog_category_name_by_id($id) {
    $db = \Config\Database::connect();
    if (is_numeric($id)) {
        $builder = $db->table('blog_categories');
        $builder->where('id', $id);
        $row = $builder->get()->getRow();
        if ($row) {
            return $row->name;
        }
    }
    return false;
}

function get_blog_category_slug_by_id($id) {
    $db = \Config\Database::connect();
    if (is_numeric($id)) {
        $builder = $db->table('blog_categories');
        $builder->where('id', $id);
        $row = $builder->get()->getRow();
        if ($row) {
            return $row->slug;
        }
    }
    return false;
}

function limitWordsBlog($text, $limit = 10, $url) {
    $word_arr = explode(" ", $text);
    $read_more = '';
    $read_more .= '<div class="read-more">';
    $read_more .= '<a href="' . $url . '">Read More</a>';
    $read_more .= '</div>';

    if (count($word_arr) > $limit) {

        $words = implode(" ", array_slice($word_arr, 0, $limit)) . $read_more;
        return $words;
    }

    return $text;
}

function limitWords($text, $limit = 10) {
    $word_arr = explode(" ", $text);

    if (count($word_arr) > $limit) {
        $words = implode(" ", array_slice($word_arr, 0, $limit)) . ' ...';
        return $words;
    }

    return $text;
}

function statuses() {
    return array('Received', 'Pending additional information', 'Processing', 'At lender', 'Lender offer', 'Offer accepted by customer', 'Funding complete', 'Commissions paid');
}

function log_activities($user_id, $id, $old_data, $insert_data) {


    $db = \Config\Database::connect();
    $userModel = new App\Models\UsersModel();
    $user = $userModel->find($user_id);

    $name = $user['firstname'] . ' ' . $user['lastname'];

    $logs = [];

    if ($old_data['firstname'] != $insert_data['firstname']) {
        $logs[] = $name . ' has changed firstname from ' . $old_data['firstname'] . ' to ' . $insert_data['firstname'];
    }

    if ($old_data['lastname'] != $insert_data['lastname']) {
        $logs[] = $name . ' has changed lastname from ' . $old_data['firstname'] . ' to ' . $insert_data['firstname'];
    }

    if ($old_data['phone'] != $insert_data['phone']) {
        $logs[] = $name . ' has changed phone no. from ' . $old_data['phone'] . ' to ' . $insert_data['phone'];
    }

    if ($old_data['email'] != $insert_data['email']) {
        $logs[] = $name . ' has changed email from ' . $old_data['email'] . ' to ' . $insert_data['email'];
    }

    if (isset($insert_data['type'])) {

        if ($old_data['type'] != $insert_data['type']) {

            $old_type = '';
            if ($old_data['type'] == 1) {
                $old_type = 'Admin';
            } else if ($old_data['type'] == 2) {
                $old_data = 'Sponsor';
            }

            $new_type = '';
            if ($insert_data['type'] == 1) {
                $new_type = 'Admin';
            } else if ($insert_data['type'] == 2) {
                $new_type = 'Sponsor';
            }

            $logs[] = $name . ' has changed role from ' . $old_type . ' to ' . $new_type;
        }
    }

    if (isset($insert_data['payment_process_1'])) {
        if ($old_data['payment_process_1'] != $insert_data['payment_process_1']) {
            $logs[] = $name . ' has changed 1<sup>st</sup> payment processor from ' . $old_data['payment_process_1'] . ' to ' . $insert_data['payment_process_1'];
        }
    }
    if (isset($insert_data['payment_process_1_id'])) {
        if ($old_data['payment_process_1_id'] != $insert_data['payment_process_1_id']) {
            $logs[] = $name . ' has changed 1<sup>st</sup> payment processor ID from ' . $old_data['payment_process_1_id'] . ' to ' . $insert_data['payment_process_1_id'];
        }
    }
    if (isset($insert_data['payment_process_2'])) {
        if ($old_data['payment_process_2'] != $insert_data['payment_process_2']) {
            $logs[] = $name . ' has changed 2<sup>nd</sup> payment processor from ' . $old_data['payment_process_2'] . ' to ' . $insert_data['payment_process_2'];
        }
    }
    if (isset($insert_data['payment_process_2_id'])) {
        if ($old_data['payment_process_2_id'] != $insert_data['payment_process_2_id']) {
            $logs[] = $name . ' has changed 2<sup>nd</sup> payment processor ID from ' . $old_data['payment_process_2_id'] . ' to ' . $insert_data['payment_process_1_id'];
        }
    }

    if (isset($insert_data['password'])) {
        $logs[] = $name . ' has changed password';
    }

    if (isset($insert_data['payment_status'])) {
        if ($old_data['payment_status'] != $insert_data['payment_status']) {
            $logs[] = $name . ' has changed payment status from ' . $old_data['payment_status'] . ' to ' . $insert_data['payment_status'];
        }
    }


    if (isset($insert_data['status'])) {
        if ($old_data['status'] != $insert_data['status']) {

            if ($old_data['status'] == 1) {
                $old_status = 'active';
            } else {
                $old_status = 'inactive';
            }

            if ($insert_data['status'] == 1) {
                $status = 'active';
            } else {
                $status = 'inactive';
            }

            $logs[] = $name . ' has changed status from ' . $old_status . ' to ' . $status;
        }
    }



    if (!empty($logs) && is_array($logs)) {
        foreach ($logs as $l) {

            $data = [
                'user_id' => $id,
                'content' => $l,
                'created_at' => date('Y-m-d h:i:s')
            ];

            $act = new \App\Models\ActivitiesModel();
            $act->save($data);
        }
    }
}

function array_has_dupes($array) {
    return count($array) !== count(array_unique($array));
}

function is_sponsor_has_access($user_id, $sponsor_id) {
    $db = \Config\Database::connect();
    if ($user_id && $sponsor_id) {
        $builder = $db->table('invitee');
        $builder->where('user_id', $user_id);
        $builder->where('sponsor_id', $sponsor_id);
        $row = $builder->get()->getRow();
        if ($row) {
            return true;
        }
        return false;
    }
    return false;
}

function currentUserBalance($id) {
    $db = \Config\Database::connect();
    $sql = 'SELECT SUM(amount) as amount FROM `transactions` WHERE sponsor_id = ' . $id . ' AND status = "paid" ';
    $query = $db->query($sql);
    $results = $query->getRow();
    if ($results) {
        return $results->amount;
    }
    return false;
}

function checkIfUserPlanExist($sponsor_id, $level_id) {
    $db = \Config\Database::connect();
    $sql = 'SELECT * FROM `sponsor_levels` WHERE sponsor_id = ' . $sponsor_id . ' AND level = ' . $level_id;
    $query = $db->query($sql);
    $results = $query->getRow();
    if ($results) {
        return $results;
    }
    return false;
}

function getCurrentUserSelectedPlans($id) {
    $db = \Config\Database::connect();
    $sql = 'SELECT * FROM `sponsor_levels` WHERE sponsor_id = ' . $id;
    $query = $db->query($sql);
    $results = $query->getResultArray();
    if ($results) {
        return $results;
    }
    return [];
}

function send_email($user, $subject, $message) {
    
    $email = \Config\Services::email();
    $email->setTo($user->email);

    $email->setSubject($subject);
    $email->setMessage($message);
    $email->send();
}

function contact_email_template_customer($to, $subject, $message) {
    $email = \Config\Services::email();
    $email->setTo($to);

    $email->setSubject($subject);
    $email->setMessage($message);
    $email->send();
}

function contact_email_template_admin($to, $subject, $message) {
    $email = \Config\Services::email();
    $email->setTo($to);

    $email->setSubject($subject);
    $email->setMessage($message);
    $email->send();
}

function quote_email_template_customer($to, $subject, $message) {
    $email = \Config\Services::email();
    $email->setTo($to);

    $email->setSubject($subject);
    $email->setMessage($message);
    $email->send();
}

function quote_email_template_admin($to, $subject, $message) {
    $email = \Config\Services::email();
    $email->setTo($to);

    $email->setSubject($subject);
    $email->setMessage($message);
    $email->send();
}