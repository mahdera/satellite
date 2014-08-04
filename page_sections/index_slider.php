<div id="slide-container"  class="clearfix">
    <div id="slider-wrapper" class="left">
        <?php
            //here get all the images stored in the page_sections/image_slider...
            $handle = opendir(dirname(realpath(__FILE__)).'/image_slider/');
        ?>
        <div id="slider" class="nivoSlider"> 
            <?php
                while($file = readdir($handle)){
                    if($file !== '.' && $file !== '..'){
                        echo "<img src='page_sections/image_slider/$file' border='0'/>";                    }
                }//end while loop
            ?>            
        </div>        
    </div>
    <div id="quickmenu" class="left">
        <h2 class="replace">Our Programs</h2>
        <div class="viewport">
            <ul class="overview">
                <li><a href="#" class="menu-box round_4"> <span class="title">Infant</span><br/>
                        Duis lobortis fermentum erat<span class="arrow"></span> </a></li>
                <li><a href="#" class="menu-box round_4"> <span class="title">Toddler</span><br/>
                        Vivamus viverra arcu pretium<span class="arrow"></span> </a></li>
                <li><a href="#" class="menu-box round_4"> <span class="title">Early Preschool</span><br/>
                        Praesent fringilla rutrum augue<span class="arrow"></span> </a></li>
                <li><a href="#" class="menu-box round_4"> <span class="title">Preschool</span><br/>
                        Vivamus faucibus erat ut lectus<span class="arrow"></span> </a></li>
                <li><a href="#" class="menu-box round_4"> <span class="title">Pre Kindergarten</span><br/>
                        Nunc scelerisque elit a lacus<span class="arrow"></span> </a></li>
                <li><a href="#" class="menu-box round_4"> <span class="title">Kindergarten</span><br/>
                        Phasellus faucibus tempor<span class="arrow"></span> </a></li>
                <li><a href="#" class="menu-box round_4"> <span class="title">Summer Camp</span><br/>
                        Suspendisse risus velit<span class="arrow"></span> </a></li>
            </ul>
        </div>
        <a class="buttons prev" href="#">Prev</a> <a class="buttons next" href="#">Next</a> </div>
</div>