
<?php
require('library/php-excel-reader/excel_reader2.php');
require('library/SpreadsheetReader.php');

include '../admin/includes/conn.php';

print_r($_FILES);
if(isset($_POST['upload']))
{
    $mimes = array('application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.oasis.opendocument.spreadsheet','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    if(in_array($_FILES["filename"]["type"],$mimes))
    {
        $uploadFilePath = basename($_FILES['filename']['name']);

		move_uploaded_file($_FILES['filename']['tmp_name'], $uploadFilePath);
        $Reader = new SpreadsheetReader($uploadFilePath);

		$totalSheet = count($Reader->sheets());
        echo "You have total ".$totalSheet." sheets".

        /* For Loop for all sheets */
        for($i=0;$i<$totalSheet;$i++)
        {
            $Reader->ChangeSheet($i);
		
            foreach ($Reader as $Row)
            {
                $indexnumber = isset($Row[0]) ? $Row[0] : '';
                $firstname = isset($Row[1]) ? $Row[1] : '';
                $lastname = isset($Row[2]) ? $Row[2] : '';

            //generate voters id
                $set = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $password = substr(str_shuffle($set), 0, 8);


                $query = "INSERT into voters (indexnumber,firstname,lastname,password,status) values('".$indexnumber."','".$firstname."','".$lastname."','$password','Unvoted')";
                $conn->query($query);
            }
        }

            echo "<script type='text/javascript'>alert('Successfully imported a CSV file!');</script>";
            echo "<script>document.location='../admin/voters.php'</script>";
        }
        else
        {
            die("<br/>Sorry, File type is not allowed. Only Excel file.");
        }
}
?>