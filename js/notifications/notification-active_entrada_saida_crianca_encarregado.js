(function ($) {
 "use strict";
 
			// Mini Notifications active class
			 $('#miniDefaultAnimation').on('click', function () {
                Lobibox.notify('default', {
                    size: 'mini',
                    msg: 'Lorem ipsum dolor sit amet hears farmer indemnity inherent.'
                });
            });
            $('#miniInfoAnimation').on('click', function () {
                Lobibox.notify('info', {
                    size: 'mini',
                    msg: 'Lorem ipsum dolor sit amet hears farmer indemnity inherent.'
                });
            });
            $('#miniWarningAnimation').on('click', function () {
                Lobibox.notify('warning', {
                    size: 'mini',
                    msg: 'Lorem ipsum dolor sit amet hears farmer indemnity inherent.'
                });
            });
            $('#miniErrorAnimation').on('click', function () {
                Lobibox.notify('error', {
                    size: 'mini',
                    msg: 'Lorem ipsum dolor sit amet hears farmer indemnity inherent.'
                });
            });
            $('#miniSuccessAnimation').on('click', function () {
                Lobibox.notify('success', {
                    size: 'mini',
                    msg: 'Lorem ipsum dolor sit amet hears farmer indemnity inherent.'
                });
            });
			
			// large Notifications active class
			 $('#largeDefaultBasic').on('click', function () {
                Lobibox.notify('default', {
                    size: 'large',
                    msg: 'Lorem ipsum dolor sit amet hears farmer indemnity inherent, youngest nestor serene horse, already, ipsum unplanted trace line. Making queries worketh game unplanted trace how erring poles.'
                });
            });
            $('#largeInfoBasic').on('click', function () {
                Lobibox.notify('info', {
                    size: 'large',
                    msg: 'Lorem ipsum dolor sit amet hears farmer indemnity inherent, youngest nestor serene horse, already, ipsum unplanted trace line. Making queries worketh game unplanted trace how erring poles.'
                });
            });
            $('#largeWarningBasic').on('click', function () {
                Lobibox.notify('warning', {
                    size: 'large',
                    msg: 'Lorem ipsum dolor sit amet hears farmer indemnity inherent, youngest nestor serene horse, already, ipsum unplanted trace line. Making queries worketh game unplanted trace how erring poles.'
                });
            });
            $('#largeErrorBasic').on('click', function () {
                Lobibox.notify('error', {
                    size: 'large',
                    msg: 'Lorem ipsum dolor sit amet hears farmer indemnity inherent, youngest nestor serene horse, already, ipsum unplanted trace line. Making queries worketh game unplanted trace how erring poles.'
                });
            });
            $('#largeSuccessBasic').on('click', function () {
                Lobibox.notify('success', {
                    size: 'large',
                    msg: 'Lorem ipsum dolor sit amet hears farmer indemnity inherent, youngest nestor serene horse, already, ipsum unplanted trace line. Making queries worketh game unplanted trace how erring poles.'
                });
            });
			// Notifications Custom Animation active class
			$('#basicInfoAnimation').on('click', function () {
                Lobibox.notify('info', {
                    showClass: 'fadeInDown',
                    hideClass: 'fadeUpDown',
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
            /*======================================= Start minhas altera????es =======================================*/
            $('#basicWarningAnimation').on('click', function () {
                Lobibox.notify('warning', {
                    showClass: 'bounceIn',
                    hideClass: 'bounceOut',
                    title: 'AVISO',
                    msg: '<b style="color:black;text-decoration:underline;">Encarregado Habitual</b> <br> Por favor selecione um encarregado.'
                });
            });
            $('#basicErrorAnimation').on('click', function () {
                Lobibox.notify('warning', {
                    showClass: 'zoomInUp',
                    hideClass: 'zoomOutDown',
                    title: 'AVISO',
                    msg: '<b style="color:black;text-decoration:underline;">Encarregado Opcional</b> <br> Por favor preencha os campos.'
                });
            });
            $('#basicErrorAnimation_presenca_funcionario_presente').on('click', function () {
                Lobibox.notify('warning', {
                    showClass: 'zoomInUp',
                    hideClass: 'zoomOutDown',
                    title: 'AVISO',
                    msg: 'O funcion??rio est?? presente.'
                });
            });
            $('#basicErrorAnimation_presenca_funcionario_saida').on('click', function () {
                Lobibox.notify('warning', {
                    showClass: 'zoomInUp',
                    hideClass: 'zoomOutDown',
                    title: 'AVISO',
                    msg: 'O funcion??rio j?? n??o se encontra na creche.'
                });
            });
             $('#basicErrorAnimation_justificativo_funcionario_n_justificou').on('click', function () {
                Lobibox.notify('warning', {
                    showClass: 'zoomInUp',
                    hideClass: 'zoomOutDown',
                    title: 'AVISO',
                    msg: 'N??o justificou.'
                });
            });
             $('#basicErrorAnimation_justificativo_funcionario_void').on('click', function () {
                Lobibox.notify('warning', {
                    showClass: 'zoomInUp',
                    hideClass: 'zoomOutDown',
                    title: 'AVISO',
                    msg: 'Porfavor seleciona um funcion??rio.'
                });
            });
            $('#basicErrorAnimation_pagamento_crianca_void').on('click', function () {
                Lobibox.notify('warning', {
                    showClass: 'zoomInUp',
                    hideClass: 'zoomOutDown',
                    title: 'AVISO',
                    msg: 'Nenhuma crian??a selecionada.'
                });
            });
            $('#basicErrorAnimation_crianca').on('click', function () {
                Lobibox.notify('error', {
                    showClass: 'zoomInUp',
                    hideClass: 'zoomOutDown',
                    title: 'Advert??ncia',
                    msg: 'Erro ao preencher o formul??rio.'
                });
            });
            $('#basicErrorAnimation_usuario').on('click', function () {
                Lobibox.notify('error', {
                    showClass: 'zoomInUp',
                    hideClass: 'zoomOutDown',
                    title: 'Advert??ncia',
                    msg: 'Este usu??rio j?? existe.'
                });
            });
            $('#basicErrorAnimation_usuario_espaco').on('click', function () {
                Lobibox.notify('error', {
                    showClass: 'zoomInUp',
                    hideClass: 'zoomOutDown',
                    title: 'Advert??ncia',
                    msg: 'N??o pode ter espa??o em braco no nome do usu??rio.'
                });
            });
            $('#basicErrorAnimation_presenca_falta').on('click', function () {
                Lobibox.notify('error', {
                    showClass: 'zoomInUp',
                    hideClass: 'zoomOutDown',
                    title: 'Advert??ncia',
                    msg: 'O funcion??rio j?? tem falta.'
                });
            });
            $('#basicErrorAnimation_presenca_excesso_falta').on('click', function () {
                Lobibox.notify('error', {
                    showClass: 'zoomInUp',
                    hideClass: 'zoomOutDown',
                    title: 'Advert??ncia',
                    msg: 'Tem excesso de faltas.'
                });
            });
            $('#basicErrorAnimation_presenca_ausente').on('click', function () {
                Lobibox.notify('error', {
                    showClass: 'zoomInUp',
                    hideClass: 'zoomOutDown',
                    title: 'Advert??ncia',
                    msg: 'O funcion??rio est?? ausente.'
                });
            });
            $('#basicErrorAnimation_presenca_motivo_falta').on('click', function () {
                Lobibox.notify('error', {
                    showClass: 'zoomInUp',
                    hideClass: 'zoomOutDown',
                    title: 'Advert??ncia',
                    msg: 'Porfavor seleciona o motivo da falta.'
                });
            });
            $('#basicErrorAnimation_pagamento_encarregado').on('click', function () {
                Lobibox.notify('error', {
                    showClass: 'zoomInUp',
                    hideClass: 'zoomOutDown',
                    title: 'Advert??ncia',
                    msg: 'Verifica o c??digo do tal??o ou a data.'
                });
            });
            $('#basicSuccessAnimation').on('click', function () {
                Lobibox.notify('success', {
                    showClass: 'rollIn',
                    hideClass: 'rollOut',
                    title:'OK!',
                    msg: 'Usu??rio cadastrado com sucesso.'
                });
            });
            $('#basicSuccessAnimation_crianca').on('click', function () {
                Lobibox.notify('success', {
                    showClass: 'rollIn',
                    hideClass: 'rollOut',
                    title:'OK!',
                    msg: 'Crian??a cadastrada com sucesso.'
                });
            });
            $('#basicSuccessAnimation_recetar_senha').on('click', function () {
                Lobibox.notify('success', {
                    showClass: 'rollIn',
                    hideClass: 'rollOut',
                    title:'OK!',
                    msg: 'A sua senha foi restaurada com sucesso.'
                });
            });
            $('#basicSuccessAnimation_cargo').on('click', function () {
                Lobibox.notify('success', {
                    showClass: 'rollIn',
                    hideClass: 'rollOut',
                    title:'OK!',
                    msg: 'Cargo cadastrado com sucesso.'
                });
            });
 
			// Notifications Custom Width active class
			 $('#basicInfoWidth').on('click', function () {
                Lobibox.notify('info', {
                    width: 300,
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
            $('#basicWarningWidth').on('click', function () {
                Lobibox.notify('warning', {
                    width: 500,
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
            $('#basicErrorWidth').on('click', function () {
                Lobibox.notify('error', {
                    width: $(window).width(),
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
            $('#basicSuccessWidth').on('click', function () {
                Lobibox.notify('success', {
                    width: 600,
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
			
			// Notifications Position active class
			$('#basicInfoPosition').on('click', function () {
                Lobibox.notify('info', {
                    position: 'top left',
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
            $('#basicWarningPosition').on('click', function () {
                Lobibox.notify('error', {
                    position: 'top right',
                    title: 'AVISO',
                    msg: 'A crian??a j?? n??o se encontra na creche.'
                });
            });
             $('#basicWarningPosition_funcionario_inserir').on('click', function () {
                Lobibox.notify('success', {
                    position: 'top right',
                    title: 'OK!',
                    msg: 'Funcion??rio cadastrado com sucesso.'
                });
            });
            /*======================================= End minhas altera????es =======================================*/
            $('#basicErrorPosition').on('click', function () {
                Lobibox.notify('error', {
                    position: 'bottom left',
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
            $('#basicSuccessPosition').on('click', function () {
                Lobibox.notify('success', {
                    position: 'bottom right',
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
			
			// Notifications No Delay active class
			$('#basicDefaultNoDelay').on('click', function () {
                Lobibox.notify('default', {
                    delay: false,
                    title: 'Info title',
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
            $('#basicInfoNoDelay').on('click', function () {
                Lobibox.notify('info', {
                    delay: false,
                    title: 'Info title',
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
            $('#basicWarningNoDelay').on('click', function () {
                Lobibox.notify('warning', {
                    delay: false,
                    title: 'Warning title',
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
            $('#basicErrorNoDelay').on('click', function () {
                Lobibox.notify('error', {
                    delay: false,
                    title: 'Error title',
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
            $('#basicSuccessNoDelay').on('click', function () {
                Lobibox.notify('success', {
                    delay: false,
                    title: 'Success title',
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
			// Notifications Custom Delay active class
			$('#basicDefaultCustomDelay').on('click', function () {
                Lobibox.notify('default', {
                    delay: 15000,
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
            $('#basicInfoCustomDelay').on('click', function () {
                Lobibox.notify('info', {
                    delay: 15000,
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
            $('#basicWarningCustomDelay').on('click', function () {
                Lobibox.notify('warning', {
                    delay: 15000,
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
            $('#basicErrorCustomDelay').on('click', function () {
                Lobibox.notify('error', {
                    delay: 15000,
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
            $('#basicSuccessCustomDelay').on('click', function () {
                Lobibox.notify('success', {
                    delay: 15000,
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
			
			// Notifications No Icon active class
			 $('#basicDefaultNoIcon').on('click', function () {
                Lobibox.notify('default', {
                    icon: false,
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
            $('#basicInfoNoIcon').on('click', function () {
                Lobibox.notify('info', {
                    icon: false,
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
            $('#basicWarningNoIcon').on('click', function () {
                Lobibox.notify('warning', {
                    icon: false,
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
            $('#basicErrorNoIcon').on('click', function () {
                Lobibox.notify('error', {
                    icon: false,
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
            $('#basicSuccessNoIcon').on('click', function () {
                Lobibox.notify('success', {
                    icon: false,
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
			
			// Notifications Custom Title active class
			$('#basicDefaultCustomTitle').on('click', function () {
                Lobibox.notify('default', {
                    title: 'Info title',
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
            $('#basicInfoCustomTitle').on('click', function () {
                Lobibox.notify('info', {
                    title: 'Info title',
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
            $('#basicWarningCustomTitle').on('click', function () {
                Lobibox.notify('warning', {
                    title: 'Warning title',
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
            $('#basicErrorCustomTitle').on('click', function () {
                Lobibox.notify('error', {
                    title: 'Error title',
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
            $('#basicSuccessCustomTitle').on('click', function () {
                Lobibox.notify('success', {
                    title: 'Success title',
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
			
			// Notifications Image active class
			$('#basicDefaultImage').on('click', function () {
                Lobibox.notify('default', {
                    img: 'img/notification/1.jpg',
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
            $('#basicInfoImage').on('click', function () {
                Lobibox.notify('info', {
                    img: 'img/notification/1.jpg',
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
            $('#basicWarningImage').on('click', function () {
                Lobibox.notify('warning', {
                    img: 'img/notification/2.jpg',
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
            $('#basicErrorImage').on('click', function () {
                Lobibox.notify('error', {
                    img: 'img/notification/3.jpg',
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
            $('#basicSuccessImage').on('click', function () {
                Lobibox.notify('success', {
                    img: 'img/notification/4.jpg',
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
			
			// Basic notifications active class
			$('#basicDefault').on('click', function () {
                Lobibox.notify('default', {
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
			$('#basicInfo').on('click', function () {
                Lobibox.notify('info', {
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
            $('#basicWarning').on('click', function () {
                Lobibox.notify('warning', {
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
            $('#basicError').on('click', function () {
                Lobibox.notify('error', {
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
			$('#basicSuccess').on('click', function () {
                Lobibox.notify('success', {
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
			
			// Notifications No Sound active class
			$('#basicInfoNoSound').on('click', function () {
                Lobibox.notify('info', {
                    sound: false,
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
            $('#basicWarningNoSound').on('click', function () {
                Lobibox.notify('warning', {
                    sound: false,
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
            $('#basicErrorNoSound').on('click', function () {
                Lobibox.notify('error', {
                    sound: false,
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
            $('#basicSuccessNoSound').on('click', function () {
                Lobibox.notify('success', {
                    sound: false,
                    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes.'
                });
            });
            
 
})(jQuery); 