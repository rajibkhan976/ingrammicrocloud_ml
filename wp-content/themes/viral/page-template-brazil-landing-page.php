<?php get_header();
/*
 Template name: Brazil Custom Landing Page Template
 */
?>
<?php
get_template_part('navigation');
?>

<?php while (have_posts()) : the_post(); ?>
<div id="page-content" style="background-color:#717171; padding-top: 80px;">


        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

       <div id="container">
                
            <div id="topo">

                <div id="contato-tel">
                    <p>55 (11) 2078-4603 | <a href="mailto:cloud.br@ingrammicro.com">cloud.br@ingrammicro.com</a></p>
                </div>

                <div id="topo-imagem">
                    <img style="background-color: #717171;" src="http://dev.ingrammicrocloud.com/br/wp-content/uploads/sites/54/2016/01/topo.png" alt="">
                </div>                

            </div>

            <div id="information-main">
                    <h1>Voc&ecirc; est&aacute; pr&oacute;ximo de implementar o backup<br />
			Azure em seu novo servidor.</h1>
                    <p>Parab&eacute;ns por ter adquirido um servidor de alta performance, conte agora com o backup Microsoft Azure. Uma solu&ccedil;&atilde;o escalon&aacute;vel que protege os dados de sua empresa atrav&eacute;s de um servi&ccedil;o simples, mas poderoso, que fornece a capacidade de fazer backup de cargas de trabalho na nuvem.</p>
            </div>

             <div id="features" style="background-image: url(http://dev.ingrammicrocloud.com/br/wp-content/uploads/sites/54/2016/01/img-1.png)">                 
                    
             </div>

              <div id="container-form">

                     <div id="chamada-form">
                            <h1 class="h1-no-blue-line">Voc&ecirc; est&aacute; quase l&aacute;!</h1>
                            <p><span  class="numberCircle">1</span><span class="steps">Preencha o formul&aacute;rio ao lado<br />com seus dados.</span></p>
                            <p><span  class="numberCircle2">2</span><span class="steps">Um especialista Ingram Micro<br />entrar&aacute; em contato.</span></p>
                            <p><span  class="numberCircle3">3</span><span class="steps">Pronto! Vamos implementar seu<br />backup Azure em seu novo servidor.</span></p>
                     </div>

                      <div id="form-div">                        
        
                                    <div id="wufoo-m1dwk87i01nzrwi">
Fill out my <a href="https://channelmarketing.wufoo.com/forms/m1dwk87i01nzrwi">online form</a>.
</div>
<script type="text/javascript">var m1dwk87i01nzrwi;(function(d, t) {
var s = d.createElement(t), options = {
'userName':'channelmarketing',
'formHash':'m1dwk87i01nzrwi',
'autoResize':true,
'height':'1615',
'async':true,
'host':'wufoo.com',
'header':'hide',
'ssl':true};
s.src = ('https:' == d.location.protocol ? 'https://' : 'http://') + 'www.wufoo.com/scripts/embed/form.js';
s.onload = s.onreadystatechange = function() {
var rs = this.readyState; if (rs) if (rs != 'complete') if (rs != 'loaded') return;
try { m1dwk87i01nzrwi = new WufooForm();m1dwk87i01nzrwi.initialize(options);m1dwk87i01nzrwi.display(); } catch (e) {}};
var scr = d.getElementsByTagName(t)[0], par = scr.parentNode; par.insertBefore(s, scr);
})(document, 'script');</script>
            

                     </div>

              </div>



              <div id="red-information" style="background-image:url(http://dev.ingrammicrocloud.com/br/wp-content/uploads/sites/54/2016/01/img-3.png)">                   
                     

              </div>

              <div id="rodape">

                          <img src="http://dev.ingrammicrocloud.com/br/wp-content/uploads/sites/54/2016/01/img-4.png" alt="" border="0" usemap="#Map" style="margin-left: 32px;">
                          <map name="Map">
                            <area shape="rect" coords="343,16,598,37" href="http://www.ingrammicrocloud.com.br/" target="_blank" alt="Ingram Micro Cloud">
                            <area shape="rect" coords="9,6,53,45" href="https://www.linkedin.com/company/ingram-micro-cloud-brasil?report%2Esuccess=MlmG7g_fqFRfD4iVhHgr0FomJDOL3vciIT4v8pi3EYkZnZLjFuJfr4acCeXZnFnMvaat" target="_blank" alt="Ingram Micro Cloud">
                          </map>
          </div>           


       </div>

       


        <script type="text/javascript" src="js/jquery.maskedinput.js"></script> 
        <script type="text/javascript" src="js/main.js"></script>

        <script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
        <script language="JavaScript" type="text/javascript" src="js/cidades-estados-1.4-utf8.js"></script>

        <script type="text/javascript" charset="utf-8">
            $(document).ready(function(){
           $("a[rel^='prettyPhoto']").prettyPhoto();
        
       
      });
    
        new dgCidadesEstados({
        cidade: document.getElementById('Cidade'),
        estado: document.getElementById('Estado')
        })
    


  
      </script>     


	<?php the_content(); endwhile; ?>

<?php get_footer(); ?>