$(document).ready(function () {

    $.ajax({
        type: "POST",
        url: './includes/combo_seccion_inc.php',
        data: $(this).serialize(),
        success: function (response) {
            alert(response);
            var categories = $.parseJSON(response);
            for (let category of categories) {
                $("select").append(' <option style="background-color: '+ category['COLOR'] +'" dataid="' + category['SECCION_ID'] + '">' + category['DESCRIPCION'] + '</option>')
            }
            console.log(response);
        }
    });

    function CrearNoticia(pTitulo, pDescripcion, pNoticia, pLugar, pFecha, pKeyword, pCategoria, pImagen) {
        var formData2 = new FormData();

        formData2.append('Titulo', pTitulo);
        formData2.append('Descripcion', pDescripcion);
        formData2.append('Noticia', pNoticia);
        formData2.append('Lugar', pLugar);
        formData2.append('Fecha', pFecha);
        formData2.append('Keyword', pKeyword);




        var Categorias = JSON.stringify(pCategoria);
        formData2.append('Categorias', Categorias);



        // var totalfiles = pImagen.length;
        //if (totalfiles > 0) {
        //  for (var index = 0; index < totalfiles; index++) {
        //     formData2.append("Imagenes[]", pImagen[index]);
        //}
        //}
        for (const archivo of pImagen) {
            formData2.append("archivos[]", archivo);
        }
        //var totalfiles = pImagen.length;
        //if (totalfiles > 0) {
        //  formData2.append("Imagenes", pImagen);

        //}



        $.ajax({
            url: "includes/crear_noticia_inc.php",
            type: "POST",
            data: formData2,
            success: function (msg) {
                console.log(msg);
                NoticiaSucces = msg;
            },
            cache: false,
            contentType: false,
            processData: false,
            async: false
        });
    }

    /*lleva al otro articulo*/
    $(".noticard").click(function () {
        window.location.href = 'noticia.html';

    });

    $("#cat_noti").change(function () {
        var selectsito = $(this).children("option:selected").attr("dataid");
        var select = $(this).children("option:selected").val();
        $(".cat-conteiner").append('<label class="ci" value="' + selectsito + '" id="' + selectsito + '">' + select + ' <button type="button" class="deletec" onClick=" $(this).parent().remove();">X</button></label>')
    });

    $(".deletec").on("click", function () {

    });
    $('#btn_noti').click(function () {



        var Titulo = $("#nom_noti").val();
        var Descripcion = $("#desc_noti").val();
        var Noticia = $("#noti").val();
        var Lugar = $("#lugar_noti").val();
        var Fecha = $("#fecha_noti").val();
        var Keyword = $("#keyword_noti").val();
        var CategoriasLabel = document.getElementsByClassName('ci');
        var Categoria = [];
        const $inputArchivos = document.querySelector("#formFile")
        const archivosParaSubir = $inputArchivos.files;

        for (var i = 0; i < CategoriasLabel.length; i++) {

            Categoria.push(CategoriasLabel[i].getAttribute('value'));

        }
        var imagenes = 0;
        var videos = 0;
        for (var i = 0; i < archivosParaSubir.length; i++) {
            var checar = archivosParaSubir[i]['type'];
            let conSubstring = checar.substring(0, 5);
            if (conSubstring === "image") {
                imagenes++;

            } else {
                if (conSubstring === "video") {
                    videos++;
                }
            }
        }
        if(imagenes===0 || videos===0){
            alert("tiene que haber porlomenos una imagen y un video");
            return;
        }
        console.log(archivosParaSubir);

        CrearNoticia(Titulo, Descripcion, Noticia, Lugar, Fecha, Keyword, Categoria, archivosParaSubir);


        if (NoticiaSuccess == "true") {
            location.href = "../perfil.php";
        }
        location.href = "http://localhost/Avance2_BDM_1851024_1862391/perfil.php";

        //Este código se ejecutará cuando le hagas click a #btn_noti
    });
    var NoticiaSuccess = null;
    var arreglito;
    $('.cat-container').children('.ci').each(function () {

    });

    function remove() {
        $(this).parent().remove();
        alert("hola");
    }
    /*Para subir noticia y validar que se llenen los campos*/
    $("#newnoti").submit(function () {

        var nombre = $("#nom_noti").val()
        var desc = $("#desc_noti").val()
        var lugar = $("#lugar_noti").val()
        var fecha = $("#fecha_noti").val()
        var noticia = $("#noti").val()
        var keyword = $("#keyword_noti").val()
        var categoria = $("#cat_noti").val()

        if (nombre == "" || desc == "" || lugar == "" || fecha == "" || hora == "" || noticia == "" || categoria == "" || keyword == "") {

            alert("Llena los espacios vacios");
        } else {

            alert("Noticia subida con exito");
        }
    });
    /*Crear categoria*/
    $(".cat").click(function () {

        var catego = $("#cate").val()


        if (catego == "") {

            alert("Llena los espacios vacios");
        } else {

            alert("Categoria subida con exito");
        }
    });
    /*login*/
    $("#log").submit(function () {
        var usuario = $("#user").val()
        var contras = $("#contra").val()

        if (usuario == "" || contras == "") {

            alert("Llena los espacios vacios");
        } else {

            window.location.href = 'noticia.html';
            alert("bienvenido");
        }
    });
    /*crear cuenta*/
    $("#newuser").submit(function () {
        var usuari0 = $("#user").val()
        var pass = $("#passw").val()
        var correo = $("#correo").val()

        if (usuari0 == "" || pass == "" || correo == "") {

            alert("Llena los espacios vacios");
        } else {
            alert("cuenta creada con exito");
        }
    });
});