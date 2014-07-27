<?php echo CHtml::form(); ?>
    <div id="language-select">
        <?php 
        if(sizeof($languages) < 3) {
            $lastElement = end($languages);
            foreach($languages as $key=>$lang) {
                if($key != $currentLang) {
                    echo CHtml::ajaxLink($lang,'',
                        array(
                            'type'=>'post',
                            'data'=>'_lang='.$key.'&YII_CSRF_TOKEN='.Yii::app()->request->csrfToken,
                            'success' => 'function(data) {window.location.reload();}',
                        ),
                        array()
                    );
                } else echo '<b>'.$lang.'</b>';
                if($lang != $lastElement) echo ' | ';
            }
        }
        else {
        	
            echo CHtml::dropDownList('_lang', $currentLang, $languages,
                array(
                		'onchange'=>'this.form.submit()',
                    //'submit' => '',
                    'csrf'=>true,
                )
            ); 
        }
        //echo CHtml::dropDownList('_lang', $currentLang, array(
        //		'it_it' => 'Italiano', 'en_us' => 'English', 'es_es' => 'Espagnol'), array('submit' => ''));
        ?>
    </div>
<?php echo CHtml::endForm(); ?>