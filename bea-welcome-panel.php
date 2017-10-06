<?php

/*
Plugin Name: BEA Welcome Panel
Plugin URI: https://github.com/BeAPI/bea-welcome-panel
Description: Welcome panel dashboard Be API
Author: https://beapi.fr
Version: 1.0.0
Author URI: https://beapi.fr
 ----
 Copyright 2017 Be API Technical team (human@beapi.fr)
 This program is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.
 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.
 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

class BEA_WELCOME_PANEL {
	public function __construct() {

		add_action( 'plugins_loaded', array( __CLASS__, 'plugins_loaded' ) );

		remove_action( 'welcome_panel', 'wp_welcome_panel' );
		add_action( 'welcome_panel', array( __CLASS__, 'beapi_welcome_panel' ) );
	}

	/**
	 * Load plugin textdomain.
	 *
	 * @since 1.0.0
	 */
	public static function plugins_loaded() {
		load_plugin_textdomain( 'bea-welcome-panel', false, basename( dirname( __FILE__ ) ) . '/languages' );
	}

	public static function beapi_welcome_panel() {
		$title            = apply_filters( 'beapi_title_welcome_panel', __( 'Bienvenu sur votre tableau de bord', 'bea-welcome-panel' ) );
		$subtitle         = apply_filters( 'beapi_subtitle_welcome_panel', __( 'Conçu et réalisé par Be API, votre agence WordPress !', 'bea-welcome-panel' ) );
		$title_column_one = apply_filters( 'beapi_title_column_one_welcome_panel', __( 'Guides d\'utilisation', 'bea-welcome-panel' ) );
		$links_column_one = apply_filters( 'beapi_links_column_one_welcome_panel', array(
			array(
				'link'   => 'https://recette.beapi.fr/knowledge-base/utiliser-projecthuddle/',
				'target' => '_blank',
				'class'  => 'welcome-icon welcome-edit-page',
				'title'  => __( 'Guide recette', 'bea-welcome-panel' )
			)
		) );
		$html_column_one  = '';
		if ( ! empty( $links_column_one ) ) {
			$html_column_one .= '<ul>';
			foreach ( $links_column_one as $link ) {
				$html_column_one .= '<li><a href="' . $link['link'] . '" target="' . $link['target'] . '" class="' . $link['class'] . '">' . $link['title'] . '</a></li>';
			}
			$html_column_one .= '</ul>';
		}
		$title_column_two = apply_filters( 'beapi_title_column_two_welcome_panel', __( 'Support', 'bea-welcome-panel' ) );
		$links_column_two = apply_filters( 'beapi_links_column_two_welcome_panel', array(
			array(
				'link'   => 'https://beapi.eu.teamwork.com',
				'target' => '_blank',
				'class'  => 'welcome-icon dashicons-admin-tools',
				'title'  => __( 'Outil de gestion de Projet Be API', 'bea-welcome-panel' )
			),
			array(
				'link'   => 'https://redmine.beapi.fr',
				'target' => '_blank',
				'class'  => 'welcome-icon dashicons-admin-tools',
				'title'  => __( 'Outil de tickets TMA Be API', 'bea-welcome-panel' )
			),
			array(
				'link'   => 'mailto:projets@beapi.fr',
				'target' => '_blank',
				'class'  => 'welcome-icon dashicons-admin-users',
				'title'  => __( 'Support : projets@beapi.fr', 'bea-welcome-panel' )
			)
		) );
		$html_column_two  = '';
		if ( ! empty( $links_column_two ) ) {
			$html_column_two .= '<ul>';
			foreach ( $links_column_two as $link ) {
				$html_column_two .= '<li><a href="' . $link['link'] . '" target="' . $link['target'] . '" class="' . $link['class'] . '">' . $link['title'] . '</a></li>';
			}
			$html_column_two .= '</ul>';
		}
		$img_src = apply_filters( 'beapi_logo_src_welcome_panel', plugin_dir_url( __FILE__ ) . 'assets/img/beapi.png' );
		$logo    = apply_filters( 'beapi_logo_welcome_panel', '<a href="https://beapi.fr/" target="_blank"><img src="' . $img_src . '" alt="Be API" /></a>' );

		echo '<div class="welcome-panel-content">
			<h2>' . $title . '</h2>
			<p class="about-description">' . $subtitle . '</p>
			<div class="welcome-panel-column-container">
				<div class="welcome-panel-column"><h3>' . $title_column_one . '</h3>' . $html_column_one . '</div>
				<div class="welcome-panel-column"><h3>' . $title_column_two . '</h3>' . $html_column_two . '</div>
				<div class="welcome-panel-column welcome-panel-last">' . $logo . '</div>
			</div>
		</div>';
	}
}

new BEA_WELCOME_PANEL();
