                                             <?php
// Author Name : Tn.B4X5T3R                                                             // Information List : 4001 list
// contact here : Tn.baxster12@gmail.com                                                // Fb : https://www.facebook.com/Baxster.ID.33
// greetz : ITS Sec Family - DarkForceArmy - JECT CYBER TEAM

print "

 █████╗ ██████╗ ███╗   ███╗██╗███╗   ██╗    ███████╗██╗███╗   ██╗██████╗ ███████╗██████╗
██╔══██╗██╔══██╗████╗ ████║██║████╗  ██║    ██╔════╝██║████╗  ██║██╔══██╗██╔════╝██╔══██
███████║██║  ██║██╔████╔██║██║██╔██╗ ██║    █████╗  ██║██╔██╗ ██║██║  ██║█████╗  ██████╔
██╔══██║██║  ██║██║╚██╔╝██║██║██║╚██╗██║    ██╔══╝  ██║██║╚██╗██║██║  ██║██╔══╝  ██╔══██
██║  ██║██████╔╝██║ ╚═╝ ██║██║██║ ╚████║    ██║     ██║██║ ╚████║██████╔╝███████╗██║  ██
╚═╝  ╚═╝╚═════╝ ╚═╝     ╚═╝╚═╝╚═╝  ╚═══╝    ╚═╝     ╚═╝╚═╝  ╚═══╝╚═════╝ ╚══════╝╚═╝  ╚═

                Admin Finder - coded by Tn.B4X5T3R
  Information list : 4001 list
  Thanks to  :ITS Sec Family - DarkForceArmy - JECT CYBER TEAM
";

echo "masukan site  : ";
$target = trim(fgets(STDIN));
$list = "cakil_wordlist.txt";
if(!preg_match("/^http:\/\//",$target) AND !preg_match("/^https:\/\//",$target)){
        $targetnya = "http://$target";
}else{
        $targetnya = $target;
}

$buka = fopen("$list","r");
$ukuran = filesize("$list");
$baca = fread($buka,$ukuran);
$lists = explode("\r\n",$baca);

foreach($lists as $login){
        $log = "$targetnya/$login";
        $ch = curl_init("$log");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if($httpcode == 200){
                 $handle = fopen("result.txt", "a+");
                fwrite($handle, "$log\n");
                print "\n\n [".date('H:m:s')."] Mencoba : $log => Ditemukan\n";
        }else{
                print "\n[".date('H:m:s')."] Mencoba : $log => tidak di temukan";
        }
}