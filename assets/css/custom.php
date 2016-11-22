<?php
    header("Content-type: text/css; charset: UTF-8");
?>
* {
margin:0;padding:0;
}
html, body{font-family: "Comic Sans MS", cursive, sans-serif; height: 100%;}
h2{font-family:sans-serif;}
header h2{padding-top: 55px;}
.padding20{padding-top: 20px;}
.padding10{padding-top: 10px;}
.margin-top-10{margin-top: 10px;}
.font20{font-size: 20px;}
.font17{font-size: 17px;}
.btn{padding: 5px 10px;}
#wrap {
    min-height: 100%;
}
main {
    overflow:auto;
    padding-bottom: 150px;
}
footer{
    position: relative;
    margin-top: -161px;
    clear:both;
    padding: 30px 0;
    height: 161px;
}
.inline-form form{
	display:inline-block;
}
.form-group.required label:after {
    content:" *";
    color:red;
}

.form-block{
    border: 1px solid rgba(0,0,0,.075);
    padding-top: 15px;
    background-color: #f5f5f5;
    padding-bottom: 15px;
}

.form-group label {
    padding-top: 5px;
}

.hover-focus:hover{
  -webkit-transform: scale(1.05);
      -ms-transform: scale(1.05);
          transform: scale(1.05);
}

.zoom{
	width : 50px;
	-webkit-transition: all .3s ease-out;
          transition: all .3s ease-out;
}

.zoom:hover {
    -webkit-transform: scale(4);
      -ms-transform: scale(4);
          transform: scale(4);
}

@font-face {
    font-family: 'KR Baby Love';
    src: url('../fonts/KR Baby Love.ttf') format('truetype');
}

.KR-Baby-Love{
    position: relative;
    top: 1px;
    display: inline-block;
    font-family: 'KR Baby Love';
    font-style: normal;
    font-weight: normal;
    line-height: 1;
    font-size: 20px;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

.KR-Baby-Love-baby:before{
    content: "g";
}

.modal-body {
    max-height: 460px;
    overflow-y: auto;
}