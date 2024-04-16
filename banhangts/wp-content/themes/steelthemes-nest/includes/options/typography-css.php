<?php
/*
 *=================================
 * Theme Typogrophy
 * Contains Redux Option Output
 * @package nest WordPress Theme
 *==================================
*/
/*--------------------------Enqueues front-end CSS for theme customization-----------------*/
function nest_typogrophy_css(){
global $nest_theme_mod;
$css = '';
/*---typography-for-h1-desktop-*/
if(!empty($nest_theme_mod['font_family_enable']) == true){
  $font_familt_commoncss = '';
  $font_familt_common = $nest_theme_mod['font_familt_common']['font-family'];
  $font_familt_commoncss = $font_familt_common ?  $font_familt_common  : '';
  if(!empty($font_familt_commoncss)){
    $css .= ':root   {--nest-family-one:' . $font_familt_commoncss . '!important}';
  }
   
    $font_familt_common_twocss = '';
    $font_familt_common_two = $nest_theme_mod['font_familt_common_two']['font-family'];
    $font_familt_common_twocss = $font_familt_common_two ?  $font_familt_common_two  : '';
    if(!empty($font_familt_common_twocss)){
      $css .= ':root   {--nest-family-two:' . $font_familt_common_twocss . '!important}';
    }
  }
  

if(!empty($nest_theme_mod['heading_style_h1_enable_desk']) == true){

$desk_h1_font_sizecss = '';
$desk_h1_font_size = $nest_theme_mod['h1_typography']['font-size'];
$desk_h1_font_sizecss = $desk_h1_font_size ? 'font-size:' . $desk_h1_font_size . '!important; ' : '';
if(!empty($desk_h1_font_sizecss)){
  $css .= '@media(min-width:768px){ body h1 , h1 , h1 a  ' . ' {' . $desk_h1_font_sizecss . '}}';
}
$desk_h1_font_weightcss = '';
$desk_h1_font_weight = $nest_theme_mod['h1_typography']['font-weight'];
$desk_h1_font_weightcss = $desk_h1_font_weight ? 'font-weight:' . $desk_h1_font_weight . '!important; ' : '';
if(!empty($desk_h1_font_weightcss)){
  $css .= ' body h1 , h1 , h1 a  ' . ' {' . $desk_h1_font_weightcss . '}';
}

$desk_h1_font_stylecss = '';
$desk_h1_font_style = $nest_theme_mod['h1_typography']['font-style'];
$desk_h1_font_stylecss = $desk_h1_font_style ? 'font-style:' . $desk_h1_font_style . '!important; ' : '';
if(!empty($desk_h1_font_stylecss)){
  $css .= 'body h1 , h1 , h1 a  ' . ' {' . $desk_h1_font_stylecss . '}';
}

$desk_h1_lineheightcss = '';
$desk_h1_lineheight = $nest_theme_mod['h1_typography']['line-height'];
$desk_h1_lineheightcss = $desk_h1_lineheight ? 'line-height:' . $desk_h1_lineheight . '!important; ' : '';
if(!empty($desk_h1_lineheightcss)){
$css .= '@media(min-width:768px){ body h1 , h1 , h1 a  ' . ' {' . $desk_h1_lineheightcss . '}}';
}

 
}
/*---typography-for-h1-desktop-*/

/*---typography-for-h1-mobile-*/

if(!empty($nest_theme_mod['heading_style_h1_enable_mob']) == true){

  $mob_h1_font_sizecss = '';
  $mob_h1_font_size = $nest_theme_mod['h1_typography_mobile']['font-size'];
  $mob_h1_font_sizecss = $mob_h1_font_size ? 'font-size:' . $mob_h1_font_size . '!important; ' : '';
  if(!empty($mob_h1_font_sizecss)){
$css .= '@media(max-width:768px){ body h1 , h1 , h1 a  ' . ' {' . $mob_h1_font_sizecss . '}}';
  }
  
  $mob_h1_font_linehecss = '';
  $mob_h1_font_lheight= $nest_theme_mod['h1_typography_mobile']['line-height'];
  $mob_h1_font_linehecss = $mob_h1_font_lheight ? 'line-height:' . $mob_h1_font_lheight . '!important; ' : '';
  if(!empty($mob_h1_font_linehecss)){
$css .= '@media(max-width:768px){ body h1 , h1 , h1 a  ' . ' {' . $mob_h1_font_linehecss . '}}';
  }
  
  }
  /*---typography-for-h1-mobile-*/

  /*---typography-for-h2-desktop-*/

if(!empty($nest_theme_mod['heading_style_h2_enable_desk']) == true){

  $desk_h2_font_sizecss = '';
  $desk_h2_font_size = $nest_theme_mod['h2_typography']['font-size'];
  $desk_h2_font_sizecss = $desk_h2_font_size ? 'font-size:' . $desk_h2_font_size . '!important; ' : '';
  if(!empty($desk_h2_font_sizecss)){
$css .= '@media(min-width:768px){ body h2 , h2 , h2 a  ' . ' {' . $desk_h2_font_sizecss . '}}';
  }
  $desk_h2_font_weightcss = '';
  $desk_h2_font_weight = $nest_theme_mod['h2_typography']['font-weight'];
  $desk_h2_font_weightcss = $desk_h2_font_weight ? 'font-weight:' . $desk_h2_font_weight . '!important; ' : '';
  if(!empty($desk_h2_font_weightcss)){
$css .= 'body h2 , h2 , h2 a  ' . ' {' . $desk_h2_font_weightcss . '}';
  }
  
  $desk_h2_font_stylecss = '';
  $desk_h2_font_style = $nest_theme_mod['h2_typography']['font-style'];
  $desk_h2_font_stylecss = $desk_h2_font_style ? 'font-style:' . $desk_h2_font_style . '!important; ' : '';
  if(!empty($desk_h2_font_stylecss)){
$css .= ' body h2 , h2 , h2 a  ' . ' {' . $desk_h2_font_stylecss . '}';
  }
  $desk_h2_lineheightcss = '';
  $desk_h2_lineheight = $nest_theme_mod['h2_typography']['line-height'];
  $desk_h2_lineheightcss = $desk_h2_lineheight ? 'line-height:' . $desk_h2_lineheight . '!important; ' : '';
  if(!empty($desk_h2_lineheightcss)){
$css .= '@media(min-width:768px){ body h2 , h2 , h2 a  ' . ' {' . $desk_h2_lineheightcss . '}}';
  }
 
  
  }
  /*---typography-for-h2-desktop-*/
  
  /*---typography-for-h2-mobile-*/
  
  if(!empty($nest_theme_mod['heading_style_h2_enable_mob']) == true){
  
$mob_h2_font_sizecss = '';
$mob_h2_font_size = $nest_theme_mod['h2_typography_mobile']['font-size'];
$mob_h2_font_sizecss = $mob_h2_font_size ? 'font-size:' . $mob_h2_font_size . '!important; ' : '';
if(!empty($mob_h2_font_sizecss)){
  $css .= '@media(max-width:768px){ body h2 , h2 , h2 a  ' . ' {' . $mob_h2_font_sizecss . '}}';
}

$mob_h2_font_linehecss = '';
$mob_h2_font_lheight= $nest_theme_mod['h2_typography_mobile']['line-height'];
$mob_h2_font_lheight = $mob_h2_font_lheight ? 'line-height:' . $mob_h2_font_lheight . '!important; ' : '';
if(!empty($mob_h2_font_linehecss)){
  $css .= '@media(max-width:768px){ body h2 , h2 , h2 a  ' . ' {' . $mob_h2_font_linehecss . '}}';
}

}
/*---typography-for-h2-mobile-*/


  /*---typography-for-h3-desktop-*/

if(!empty($nest_theme_mod['heading_style_h3_enable_desk']) == true){

  $desk_h3_font_sizecss = '';
  $desk_h3_font_size = $nest_theme_mod['h3_typography']['font-size'];
  $desk_h3_font_sizecss = $desk_h3_font_size ? 'font-size:' . $desk_h3_font_size . '!important; ' : '';
  if(!empty($desk_h3_font_sizecss)){
$css .= '@media(min-width:768px){ body h3 , h3 , h3 a  ' . ' {' . $desk_h3_font_sizecss . '}}';
  }
  $desk_h3_font_weightcss = '';
  $desk_h3_font_weight = $nest_theme_mod['h3_typography']['font-weight'];
  $desk_h3_font_weightcss = $desk_h3_font_weight ? 'font-weight:' . $desk_h3_font_weight . '!important; ' : '';
  if(!empty($desk_h3_font_weightcss)){
$css .= 'body h3 , h3 , h3 a  ' . ' {' . $desk_h3_font_weightcss . '}';
  }
  
  $desk_h3_font_stylecss = '';
  $desk_h3_font_style = $nest_theme_mod['h3_typography']['font-style'];
  $desk_h3_font_stylecss = $desk_h3_font_style ? 'font-style:' . $desk_h3_font_style . '!important; ' : '';
  if(!empty($desk_h3_font_stylecss)){
$css .= 'body h3 , h3 , h3 a ' . ' {' . $desk_h3_font_stylecss . '}';
  }
  $desk_h3_lineheightcss = '';
  $desk_h3_lineheight = $nest_theme_mod['h3_typography']['line-height'];
  $desk_h3_lineheightcss = $desk_h3_lineheight ? 'line-height:' . $desk_h3_lineheight . '!important; ' : '';
  if(!empty($desk_h3_lineheightcss)){
  $css .= '@media(min-width:768px){ body h3 , h3 , h3 a  ' . ' {' . $desk_h3_lineheightcss . '}}';
  }
  
  }
  /*---typography-for-h3-desktop-*/
  
  /*---typography-for-h3-mobile-*/
  
  if(!empty($nest_theme_mod['heading_style_h3_enable_mob']) == true){
  
$mob_h3_font_sizecss = '';
$mob_h3_font_size = $nest_theme_mod['h3_typography_mobile']['font-size'];
$mob_h3_font_sizecss = $mob_h3_font_size ? 'font-size:' . $mob_h3_font_size . '!important; ' : '';
if(!empty($mob_h3_font_sizecss)){
  $css .= '@media(max-width:768px){body h3 , h3 , h3 a  ' . ' {' . $mob_h3_font_size . '}}';
}

$mob_h3_font_linehecss = '';
$mob_h3_font_lheight= $nest_theme_mod['h3_typography_mobile']['line-height'];
$mob_h3_font_linehecss = $mob_h3_font_lheight ? 'line-height:' . $mob_h3_font_lheight . '!important; ' : '';
if(!empty($mob_h3_font_linehecss)){
  $css .= '@media(max-width:768px){body h3 , h3 , h3 a  ' . ' {' . $mob_h3_font_linehecss . '}}';
}

}
/*---typography-for-h3-mobile-*/


  /*---typography-for-h4-desktop-*/

if(!empty($nest_theme_mod['heading_style_h4_enable_desk']) == true){

  $desk_h4_font_sizecss = '';
  $desk_h4_font_size = $nest_theme_mod['h4_typography']['font-size'];
  $desk_h4_font_sizecss = $desk_h4_font_size ? 'font-size:' . $desk_h4_font_size . '!important; ' : '';
  if(!empty($desk_h4_font_sizecss)){
$css .= '@media(min-width:768px){ body h4 , h4 , h4 a  ' . ' {' . $desk_h4_font_sizecss . '}}';
  }
  $desk_h4_font_weightcss = '';
  $desk_h4_font_weight = $nest_theme_mod['h4_typography']['font-weight'];
  $desk_h4_font_weightcss = $desk_h4_font_weight ? 'font-weight:' . $desk_h4_font_weight . '!important; ' : '';
  if(!empty($desk_h4_font_weightcss)){
$css .= 'body h4 , h4 , h4 a  ' . ' {' . $desk_h4_font_weightcss . '}';
  }
  
  $desk_h4_font_stylecss = '';
  $desk_h4_font_style = $nest_theme_mod['h4_typography']['font-style'];
  $desk_h4_font_stylecss = $desk_h4_font_style ? 'font-style:' . $desk_h4_font_style . '!important; ' : '';
  if(!empty($desk_h4_font_stylecss)){
$css .= 'body h4 , h4 , h4 a ' . ' {' . $desk_h4_font_stylecss . '}';
  }
  
 
$desk_h4_lineheightcss = '';
$desk_h4_lineheight = $nest_theme_mod['h4_typography']['line-height'];
$desk_h4_lineheightcss = $desk_h4_lineheight ? 'line-height:' . $desk_h4_lineheight . '!important; ' : '';
if(!empty($desk_h4_lineheightcss)){
$css .= '@media(min-width:768px){ body h4 , h4 , h4 a  ' . ' {' . $desk_h4_lineheightcss . '}}';
}
  
  }
  /*---typography-for-h4-desktop-*/
  
  /*---typography-for-h4-mobile-*/
  
  if(!empty($nest_theme_mod['heading_style_h4_enable_mob']) == true){
  
$mob_h4_font_sizecss = '';
$mob_h4_font_size = $nest_theme_mod['h4_typography_mobile']['font-size'];
$mob_h4_font_sizecss = $mob_h4_font_size ? 'font-size:' . $mob_h4_font_size . '!important; ' : '';
if(!empty($mob_h3_font_sizecss)){
  $css .= '@media(max-width:768px){body h4 , h4 , h4 a  ' . ' {' . $mob_h3_font_sizecss . '}}';
}

$mob_h4_font_linehecss = '';
$mob_h4_font_lheight= $nest_theme_mod['h4_typography_mobile']['line-height'];
$mob_h4_font_linehecss = $mob_h4_font_lheight ? 'line-height:' . $mob_h4_font_lheight . '!important; ' : '';
if(!empty($mob_h4_font_linehecss)){
  $css .= '@media(max-width:768px){body h4 , h4 , h4 a  ' . ' {' . $mob_h4_font_linehecss . '}}';
}

}
/*---typography-for-h4-mobile-*/


  /*---typography-for-h5-desktop-*/

if(!empty($nest_theme_mod['heading_style_h5_enable_desk']) == true){

  $desk_h5_font_sizecss = '';
  $desk_h5_font_size = $nest_theme_mod['h5_typography']['font-size'];
  $desk_h5_font_sizecss = $desk_h5_font_size ? 'font-size:' . $desk_h5_font_size . '!important; ' : '';
  if(!empty($desk_h5_font_sizecss)){
$css .= '@media(min-width:768px){ body h5 , h5 , h5 a  ' . ' {' . $desk_h5_font_sizecss . '}}';
  }
  $desk_h5_font_weightcss = '';
  $desk_h5_font_weight = $nest_theme_mod['h5_typography']['font-weight'];
  $desk_h5_font_weightcss = $desk_h5_font_weight ? 'font-weight:' . $desk_h5_font_weight . '!important; ' : '';
  if(!empty($desk_h5_font_weightcss)){
$css .= 'body h5 , h5 , h5 a   ' . ' {' . $desk_h5_font_weightcss . '}';
  }
  
  $desk_h5_font_stylecss = '';
  $desk_h5_font_style = $nest_theme_mod['h5_typography']['font-style'];
  $desk_h5_font_stylecss = $desk_h5_font_style ? 'font-style:' . $desk_h5_font_style . '!important; ' : '';
  if(!empty($desk_h5_font_stylecss)){
$css .= 'body h5 , h5 , h5 a  ' . ' {' . $desk_h5_font_stylecss . '}';
  }
  $desk_h5_lineheightcss = '';
$desk_h5_lineheight = $nest_theme_mod['h5_typography']['line-height'];
$desk_h5_lineheightcss = $desk_h5_lineheight ? 'line-height:' . $desk_h5_lineheight . '!important; ' : '';
if(!empty($desk_h5_lineheightcss)){
$css .= '@media(min-width:768px){ body h5 , h5 , h5 a  ' . ' {' . $desk_h5_lineheightcss . '}}';
}
 
  
  }
  /*---typography-for-h5-desktop-*/
  
  /*---typography-for-h5-mobile-*/
  
  if(!empty($nest_theme_mod['heading_style_h5_enable_mob']) == true){
  
$mob_h5_font_sizecss = '';
$mob_h5_font_size = $nest_theme_mod['h5_typography_mobile']['font-size'];
$mob_h5_font_sizecss = $mob_h5_font_size ? 'font-size:' . $mob_h5_font_size . '!important; ' : '';
if(!empty($mob_h3_font_sizecss)){
  $css .= '@media(max-width:768px){body h5 , h5 , h5 a   ' . ' {' . $mob_h3_font_sizecss . '}}';
}

$mob_h5_font_linehecss = '';
$mob_h5_font_lheight= $nest_theme_mod['h5_typography_mobile']['line-height'];
$mob_h5_font_linehecss = $mob_h5_font_lheight ? 'line-height:' . $mob_h5_font_lheight . '!important; ' : '';
if(!empty($mob_h5_font_linehecss)){
  $css .= '@media(max-width:768px){body h5 , h5 , h5 a  ' . ' {' . $mob_h5_font_linehecss . '}}';
}

}
/*---typography-for-h5-mobile-*/

  /*---typography-for-h6-desktop-*/

if(!empty($nest_theme_mod['heading_style_h6_enable_desk']) == true){

  $desk_h6_font_sizecss = '';
  $desk_h6_font_size = $nest_theme_mod['h6_typography']['font-size'];
  $desk_h6_font_sizecss = $desk_h6_font_size ? 'font-size:' . $desk_h6_font_size . '!important; ' : '';
  if(!empty($desk_h6_font_sizecss)){
$css .= '@media(min-width:768px){ body h6 , h6 , h6 a  ' . ' {' . $desk_h6_font_sizecss . '}}';
  }
  $desk_h6_font_weightcss = '';
  $desk_h6_font_weight = $nest_theme_mod['h6_typography']['font-weight'];
  $desk_h6_font_weightcss = $desk_h6_font_weight ? 'font-weight:' . $desk_h6_font_weight . '!important; ' : '';
  if(!empty($desk_h6_font_weightcss)){
$css .= 'body h6 , h6 , h6 a   ' . ' {' . $desk_h6_font_weightcss . '}';
  }
  
  $desk_h6_font_stylecss = '';
  $desk_h6_font_style = $nest_theme_mod['h6_typography']['font-style'];
  $desk_h6_font_stylecss = $desk_h6_font_style ? 'font-style:' . $desk_h6_font_style . '!important; ' : '';
  if(!empty($desk_h6_font_stylecss)){
$css .= 'body h6 , h6 , h6 a  ' . ' {' . $desk_h6_font_stylecss . '}';
  }
  
  $desk_h6_lineheightcss = '';
  $desk_h6_lineheight = $nest_theme_mod['h6_typography']['line-height'];
  $desk_h6_lineheightcss = $desk_h6_lineheight ? 'line-height:' . $desk_h6_lineheight . '!important; ' : '';
  if(!empty($desk_h6_lineheightcss)){
  $css .= '@media(min-width:768px){ body h6 , h6 , h6 a  ' . ' {' . $desk_h6_lineheightcss . '}}';
  }
  
  }
  /*---typography-for-h6-desktop-*/
  
  /*---typography-for-h6-mobile-*/
  
  if(!empty($nest_theme_mod['heading_style_h5_enable_mob']) == true){
  
$mob_h6_font_sizecss = '';
$mob_h6_font_size = $nest_theme_mod['h6_typography_mobile']['font-size'];
$mob_h6_font_sizecss = $mob_h6_font_size ? 'font-size:' . $mob_h6_font_size . '!important; ' : '';
if(!empty($mob_h6_font_sizecss)){
  $css .= '@media(max-width:768px){body h6 , h6 , h6 a' . ' {' . $mob_h6_font_sizecss . '}}';
}

$mob_h6_font_linehecss = '';
$mob_h6_font_lheight= $nest_theme_mod['h6_typography_mobile']['line-height'];
$mob_h6_font_linehecss = $mob_h6_font_lheight ? 'line-height:' . $mob_h6_font_lheight . '!important; ' : '';
if(!empty($mob_h6_font_linehecss)){
  $css .= '@media(max-width:768px){body h6 , h6 , h6 a   ' . ' {' . $mob_h6_font_linehecss . '}}';
}

}
/*---typography-for-h6-mobile-*/



  /*---typography-body-*/

  if(!empty($nest_theme_mod['body_custom_fonts']) == true){

$body_font_sizecss = '';
$body_font_size = $nest_theme_mod['body_typography']['font-size'];
$body_font_sizecss = $body_font_size ? 'font-size:' . $body_font_size . '!important; ' : '';
if(!empty($body_font_sizecss)){
  $css .= ' body  , p , body p   ' . ' {' . $body_font_sizecss . '}';
}
$body_font_weightcss = '';
$body_font_weight = $nest_theme_mod['body_typography']['font-weight'];
$body_font_weightcss = $body_font_weight ? 'font-weight:' . $body_font_weight . '!important; ' : '';
if(!empty($body_font_weightcss)){
  $css .= 'body  , p , body p  ' . ' {' . $body_font_weightcss . '}';
}

$body_font_stylecss = '';
$body_font_style = $nest_theme_mod['body_typography']['font-style'];
$body_font_stylecss = $body_font_style ? 'font-style:' . $body_font_style . '!important; ' : '';
if(!empty($body_font_stylecss)){
  $css .= 'body  , p , body p  ' . ' {' . $body_font_stylecss . '}';
}

$body_lineheightcss = '';
$body_lineheight = $nest_theme_mod['body_typography']['line-height'];
$body_lineheightcss = $body_lineheight ? 'line-height:' . $body_lineheight . '!important; ' : '';
if(!empty($body_lineheightcss)){
$css .= '@media(min-width:768px){ body  , p , body p  ' . ' {' . $body_lineheightcss . '}}';
}


}
  /*---typography-body---*/
 

 
return $css;
}



