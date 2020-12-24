tinymce.init({
    selector: '#mytextarea',
    branding: false,
    height: 300,
    menubar: false,
    relative_urls : false,
    plugins: [
    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
    "searchreplace wordcount visualblocks visualchars code fullscreen",
    "insertdatetime media nonbreaking save table contextmenu directionality",
    "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "styleselect | bold italic | " +
            " alignleft aligncenter alignright alignjustify | " +
            "bullist numlist outdent indent | link | image | media | preview print fullpage",
    block_formats: 'Paragraph=p; Header 1=h1; Header 2=h2; Header 3=h3'
});

