<?php
/*********************************************************************
    index.php

    Helpdesk landing page. Please customize it to fit your needs.

    Peter Rotich <peter@osticket.com>
    Copyright (c)  2006-2013 osTicket
    http://www.osticket.com

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See LICENSE.TXT for details.

    vim: expandtab sw=4 ts=4 sts=4:
**********************************************************************/
require('client.inc.php');

require_once INCLUDE_DIR . 'class.page.php';

$section = 'home';
require(CLIENTINC_DIR.'header.inc.php');
?>
<div id="landing_page">
    <div class="row">
        <div class="col-lg-9">
            <?php if ($cfg && $cfg->isKnowledgebaseEnabled()): ?>
                <div class="search-form">
                    <form method="get" action="kb/faq.php">
                        <div class="input-group">
                            <input type="hidden" name="a" value="search"/>
                            <input type="text" name="q" class="form-control" placeholder="<?php echo __('Search our knowledge base'); ?>"/>
                            <button type="submit" class="btn btn-success"><?php echo __('Search'); ?></button>
                        </div>
                    </form>
                </div>
            <?php endif; ?>

            <div class='mt-3'>
                <?php
                    if($cfg && ($page = $cfg->getLandingPage()))
                        echo $page->getBodyWithImages();
                    else
                        echo  '<h1>'.__('Welcome to the Support Center').'</h1>';
                ?>
            </div>

            <div style='display:none' >
                <?php if($cfg && $cfg->isKnowledgebaseEnabled()): ?>
            
            
            <?php
                $cats = Category::getFeatured();
                ?>
                <?php if ($cats->all()): ?>
                    <h1><?= __('Featured Knowledge Base Articles'); ?></h1>
                <?php endif;?>

                <?php foreach ($cats as $C): ?>
    
                    <div class="front-page">
                        <i class="icon-folder-open icon-2x"></i>
                        <div class="category-name">
                            <?php echo $C->getName(); ?>
                        </div>

                        <div class="row">
                        <?php foreach ($C->getTopArticles() as $F): ?>
                                    <div class="col-lg-4">
                                        <a href="<?php echo ROOT_PATH;?>kb/faq.php?id=<?php echo $F->getId(); ?>">
                                        <div class="card">
                                            <div class="card-header"><?php echo $F->getQuestion(); ?></div>
                                            <div class="card-panel">
                                                <div class="article-teaser"><?php echo $F->getTeaser(); ?></div>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                        <?php endforeach; ?>
                        </div>
                        
                    </div>
                
                <?php endforeach; ?>
                <?php endif;?>
            </div>
        </div>

        <div class="col-lg-3">
            <?php include CLIENTINC_DIR.'templates/sidebar.tmpl.php'; ?>
        </div>
    </div>

<div class="">

<div class="thread-body">

    </div>
</div>
<div class="clear"></div>

<div>

<br/><br/>

</div>
</div>

<?php require(CLIENTINC_DIR.'footer.inc.php'); ?>
