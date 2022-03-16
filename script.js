
    function reg()
    {
        login=document.registr.name.value;
        pass=document.registr.pass.value;
        email=document.registr.add.value;

        console.log("Данные из текстовых полей: "+login+ " "+pass+" "+email);

        var mailing_console=false;
        if(document.registr.mailing.checked){mailing_console=document.registr.mailing.value;}
        console.log("Данные из переключателей: " + mailing_console);
        var mailing=document.registr.mailing.checked;

        for (i=0;i<document.registr.gender.length;i++){
            if(document.registr.gender[i].checked){
                gender=document.registr.gender[i].value;}
        }

        console.log("Данные из переключателей: "+gender);

        var sity_en;
        var sity_ru;
        var index;
        index=document.registr.city.selectedIndex;
        sity_en=document.registr.city[index].value;
        sity_ru=document.registr.city[index].text;
        console.log("Данные из выпадающего списка: "+ index + " " + sity_en + " " + sity_ru);

    }



