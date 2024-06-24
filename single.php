<?php
/**
 * Single posts
 * 
 * SILOHON TERABOX Wordpress Theme
 * 
 * @package terabox
 * 
 * @link https://github.com/akbarsilohon/terabox.git
 */

get_header();

$meta           = get_post_meta( get_the_ID() );
$appStar        = $meta['appStar'][0];
$appReviews     = $meta['appReviews'][0];
$appDownload    = isset($meta['appDownload'][0]) ? $meta['appDownload'][0] : '';
$appLink        = isset($meta['appLink'][0]) ? $meta['appLink'][0] : '';

$safetyDesc = isset( $meta['safetyDesc'][0] ) ? $meta['safetyDesc'][0] : 'Safety starts with understanding how developers collect and share your data. Data privacy and security practices may vary based on your use, region and age The developer provided this information and may update it over time.';
$appDataShare   = isset($meta['appDataShare'][0]) ? $meta['appDataShare'][0] : '';
$appDataCloud   = isset($meta['appDataCloud'][0]) ? $meta['appDataCloud'][0] : '';
$appDataLock    = isset($meta['appDataLock'][0]) ? $meta['appDataLock'][0] : '';
$appDataTrash   = isset($meta['appDataTrash'][0]) ? $meta['appDataTrash'][0] : '';
$appDataShield  = isset($meta['appDataShield'][0]) ? $meta['appDataShield'][0] : '';

$appStar5 = isset($meta['appStar5'][0]) ? $meta['appStar5'][0] : 0;
$appStar4 = isset($meta['appStar4'][0]) ? $meta['appStar4'][0] : 0;
$appStar3 = isset($meta['appStar3'][0]) ? $meta['appStar3'][0] : 0;
$appStar2 = isset($meta['appStar2'][0]) ? $meta['appStar2'][0] : 0;
$appStar1 = isset($meta['appStar1'][0]) ? $meta['appStar1'][0] : 0;

$total = $appStar5 + $appStar4 + $appStar3 + $appStar2 + $appStar1;

$percentageAppStar5 = $total != 0 ? ($appStar5 / $total) * 100 : 0;
$percentageAppStar4 = $total != 0 ? ($appStar4 / $total) * 100 : 0;
$percentageAppStar3 = $total != 0 ? ($appStar3 / $total) * 100 : 0;
$percentageAppStar2 = $total != 0 ? ($appStar2 / $total) * 100 : 0;
$percentageAppStar1 = $total != 0 ? ($appStar1 / $total) * 100 : 0;

$averageRating = $total != 0 ? ($appStar5 * 5 + $appStar4 * 4 + $appStar3 * 3 + $appStar2 * 2 + $appStar1 * 1) / $total : 0;

?>

<div class="container teraPosts mobile-0">
    <article id="post-<?php the_ID(); ?>" class="single-post">
        <section class="head_post">
            <div class="head_top">
                <?php echo tera_render_post_thumbnails( get_the_ID(), 'full', 'full_img', 'eager' ); ?>
                <div class="head_absolute">
                    <?php echo tera_generate_app_icon( get_the_ID(), 'single_icon', 'eager' ); ?>
                    <?php the_title('<h1 class="single_title">', '</h1>'); ?>
                </div>
            </div>

            <div class="app_info">
                <span class="data_star">
                    <span class="toppers">
                        <?php echo number_format( $averageRating, 1) . ' &#9734;'; ?>
                    </span>
                    <span class="infos">
                        <?php echo $appReviews . ' reviews'; ?>
                    </span>
                </span>
                <span class="data_download">
                    <span class="toppers">
                        <?php echo $appDownload; ?>
                    </span>
                    <span class="infos">Download</span>
                </span>
                <span class="fakes">
                    <span class="toppers">&#9729;</span>
                    <span class="infos">Ready Install</span>
                </span>
            </div>

            <?php 
            /**
             * Render Ads Before Content
             * 
             * @package terabox
             */
            
            $adBeforeCOntent = get_option('tera_options')['beforeContent_ad'];

            if( !empty( $adBeforeCOntent )){
                echo '<div class="boxHomeAd">'. $adBeforeCOntent .'</div>';
            }


            ?>

            <a href="<?php echo $appLink; ?>" title="download <?php echo the_title(); ?>" class="appLink">Download</a>
        </section>

        <section class="da_star">
            <div class="section_title">
                <span>Ratings App</span>
                <span class="arrow">&#8594;</span>
            </div>

            <div class="dataStartReview">
                <span class="bigRating">
                    <span class="starNumber">
                        <?php echo number_format( $averageRating, 1); ?>
                    </span>
                    <span class="starRevs">
                        <?php echo $appReviews; ?>
                        reviews
                    </span>
                </span>
                <ul class="blogSistem">
                    <li class="sistemBggray">
                        <span class="number">5</span>
                        <div class="inner_percent">
                            <span class="innerGray"></span>
                            <span class="bgPersentase" title="<?php echo $appStar5; ?>" style="width: <?php echo $percentageAppStar5; ?>%;"></span>
                        </div>
                    </li>
                    <li class="sistemBggray">
                        <span class="number">4</span>
                        <div class="inner_percent">
                            <span class="innerGray"></span>
                            <span class="bgPersentase" title="<?php echo $appStar4; ?>" style="width: <?php echo $percentageAppStar4; ?>%;"></span>
                        </div>
                    </li>
                    <li class="sistemBggray">
                        <span class="number">3</span>
                        <div class="inner_percent">
                            <span class="innerGray"></span>
                            <span class="bgPersentase" title="<?php echo $appStar3; ?>" style="width: <?php echo $percentageAppStar3; ?>%;"></span>
                        </div>
                    </li>
                    <li class="sistemBggray">
                        <span class="number">2</span>
                        <div class="inner_percent">
                            <span class="innerGray"></span>
                            <span class="bgPersentase" title="<?php echo $appStar2; ?>" style="width: <?php echo $percentageAppStar2; ?>%;"></span>
                        </div>
                    </li>
                    <li class="sistemBggray">
                        <span class="number">1</span>
                        <div class="inner_percent">
                            <span class="innerGray"></span>
                            <span class="bgPersentase" title="<?php echo $appStar1; ?>" style="width: <?php echo $percentageAppStar1; ?>%;"></span>
                        </div>
                    </li>
                </ul>
            </div>

        </section>

        <section class="body_post">
            <div class="section_title">
                <span>About This App</span>
                <span class="arrow">&#8594;</span>
            </div>

            <?php 
            $adBeforeCOntent = get_option('tera_options')['beforeContent_ad'];

            if( !empty( $adBeforeCOntent )){
                echo '<div class="boxHomeAd">'. $adBeforeCOntent .'</div>';
            }
            
            ?>

            <div class="content_inner">
                <?php the_content(); ?>
            </div>


            <div class="appUpdate">
                <span class="updateOn">Update On</span>
                <span class="appDate"><?php echo the_time('F, D, Y'); ?></span>
            </div>

            <?php

                /**
                 * Render Tags
                 * 
                 * @package terabox
                 */
                $tags = get_the_tags();
                if( !empty( $tags )){ ?>

                    <div class="tera_tags">
                        <?php foreach( $tags as $tag ){ ?>

                            <a href="<?php echo esc_url( get_tag_link($tag->term_id)); ?>" class="tagLink" title="<?php echo esc_attr( $tag->name ); ?>">
                                <?php echo esc_attr( $tag->name ); ?>
                            </a>

                            <?php
                        } ?>
                    </div>

                    <?php
                }

            ?>


        </section>

        <section class="data_safety">
            <div class="section_title">
                <span>Data Safety</span>
                <span class="arrow">&#8594;</span>
            </div>

            <?php 
            $adBeforeCOntent = get_option('tera_options')['beforeContent_ad'];

            if( !empty( $adBeforeCOntent )){
                echo '<div class="boxHomeAd">'. $adBeforeCOntent .'</div>';
            }
            
            ?>

            <p><?php echo esc_attr( $safetyDesc ); ?></p>

            <div class="safety_box">
                <?php if(!empty ($appDataShare)){ ?>
                    <div class="box_data">
                        <div class="box_icon">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#5f6368"><path d="M720-80q-50 0-85-35t-35-85q0-7 1-14.5t3-13.5L322-392q-17 15-38 23.5t-44 8.5q-50 0-85-35t-35-85q0-50 35-85t85-35q23 0 44 8.5t38 23.5l282-164q-2-6-3-13.5t-1-14.5q0-50 35-85t85-35q50 0 85 35t35 85q0 50-35 85t-85 35q-23 0-44-8.5T638-672L356-508q2 6 3 13.5t1 14.5q0 7-1 14.5t-3 13.5l282 164q17-15 38-23.5t44-8.5q50 0 85 35t35 85q0 50-35 85t-85 35Zm0-640q17 0 28.5-11.5T760-760q0-17-11.5-28.5T720-800q-17 0-28.5 11.5T680-760q0 17 11.5 28.5T720-720ZM240-440q17 0 28.5-11.5T280-480q0-17-11.5-28.5T240-520q-17 0-28.5 11.5T200-480q0 17 11.5 28.5T240-440Zm480 280q17 0 28.5-11.5T760-200q0-17-11.5-28.5T720-240q-17 0-28.5 11.5T680-200q0 17 11.5 28.5T720-160Zm0-600ZM240-480Zm480 280Z"/></svg>
                        </div>
                        <p class="box_p"><?php echo $appDataShare; ?></p>
                    </div>
                    <?php
                }
                
                if(!empty( $appDataCloud )){ ?>
                    <div class="box_data">
                        <div class="box_icon">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#5f6368"><path d="M260-160q-91 0-155.5-63T40-377q0-78 47-139t123-78q25-92 100-149t170-57q117 0 198.5 81.5T760-520q69 8 114.5 59.5T920-340q0 75-52.5 127.5T740-160H520q-33 0-56.5-23.5T440-240v-206l-64 62-56-56 160-160 160 160-56 56-64-62v206h220q42 0 71-29t29-71q0-42-29-71t-71-29h-60v-80q0-83-58.5-141.5T480-720q-83 0-141.5 58.5T280-520h-20q-58 0-99 41t-41 99q0 58 41 99t99 41h100v80H260Zm220-280Z"/></svg>
                        </div>
                        <p class="box_p"><?php echo $appDataCloud; ?></p>
                    </div>
                    <?php
                }
                
                if( !empty( $appDataLock )){ ?>
                    <div class="box_data">
                        <div class="box_icon">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#5f6368"><path d="M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm0-80h480v-400H240v400Zm240-120q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80ZM240-160v-400 400Z"/></svg>
                        </div>
                        <p class="box_p"><?php echo $appDataLock; ?></p>
                    </div>
                    <?php
                }
                
                if( !empty( $appDataTrash )){ ?>
                    <div class="box_data">
                        <div class="box_icon">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#5f6368"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
                        </div>
                        <p class="box_p"><?php echo $appDataTrash; ?></p>
                    </div>
                    <?php
                }
                
                if( !empty( $appDataShield )){ ?>
                    <div class="box_data">
                        <div class="box_icon">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#5f6368"><path d="M480-80q-139-35-229.5-159.5T160-516v-244l320-120 320 120v244q0 152-90.5 276.5T480-80Zm0-84q97-30 162-118.5T718-480H480v-315l-240 90v207q0 7 2 18h238v316Z"/></svg>
                        </div>
                        <p class="box_p"><?php echo $appDataShield; ?></p>
                    </div>
                    <?php
                } ?>
            </div>
        </section>
    </article>
</div>

<?php
get_footer();