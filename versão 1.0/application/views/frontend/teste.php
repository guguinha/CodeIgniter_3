<script>
    var ua = navigator.userAgent.toLowerCase();
    //var aMobile = '';
    var iMobile = '';
    // === REDIRECIONAMENTO PARA iPhone, Android,  ===
    // Lista de substrings a procurar para ser identificado como mobile WAP
    //uMobile += 'iphone;ipod;windows phone;android;iemobile 8';
    iMobile += 'iphone;ipod';
    //aMobile += 'android';
    // Separa os itens individualmente em um array
    v_iMobile = iMobile.split(';');
    //var boolAndroid = false;
    var boolIos = false;

    /*if (ua.indexOf(aMobile) != -1){
    **    boolAndroid = true;
    **}else{
    **    if(boolAndroid != true){ 
    */
    // percorre todos os itens verificando se eh IOS mobile
            for (i=0;i<=v_iMobile.length;i++){
                if (ua.indexOf(v_iMobile[i]) != -1){
                    boolIos = true;
                }
            }
    /*    }
    **}
    */
    if (boolIos == true){
        location.href='https://itunes.apple.com/br/app/showtec/id1093132531';
    } else { 
        location.href='https://play.google.com/store/apps/details?id=com.show.diego.gestormovel';  
    }  
</script>



   