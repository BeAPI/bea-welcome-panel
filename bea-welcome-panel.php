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

		$src     = plugin_dir_url( __FILE__ ) . 'assets/img/beapi.png';
		$img_src = apply_filters( 'beapi_logo_welcome_panel', $src );

		echo '
		<div class="welcome-panel-content">
			<h2>' . __( "Welcome to your dashboard", "bea-welcome-panel" ) . '</h2>
			<p class="about-description">' . __( "Conçu et réalisé par Be API, votre agence WordPress !", "bea-welcome-panel" ) . '</p>
			<div class="welcome-panel-column-container">
				<div class="welcome-panel-column">
					<h3>' . __( "Guides d'utilisation", "bea-welcome-panel" ) . '</h3>
					<ul>
						<li><a href="https://recette.beapi.fr/knowledge-base/utiliser-projecthuddle/" target="_blank" class="welcome-icon welcome-edit-page">Guide recette</a></li>
						<li><a href="" class="welcome-icon welcome-add-page"></a></li>
						<li><a href="" class="welcome-icon welcome-write-blog"></a></li>
						<li><a href="" class="welcome-icon welcome-view-site"></a></li>
					</ul>
				</div>
				<div class="welcome-panel-column">
					<h3>Support</h3>
					<ul>
						<li><a href="https://beapi.eu.teamwork.com" target="_blank" class="welcome-icon dashicons-admin-tools">' . __( "Outil de tickets projet Be API", "bea-welcome-panel" ) . '</a></li>
						<li><a href="https://redmine.beapi.fr" target="_blank" class="welcome-icon dashicons-admin-tools">' . __( "Outil de tickets TMA Be API", "bea-welcome-panel" ) . '</a></li>
						<li><a href="mailto:projets@beapi.fr" target="_blank" class="welcome-icon dashicons-admin-users">' . __( "Support : projets@beapi.fr", "bea-welcome-panel" ) . '</a></li>
					</ul>
				</div>
				<div class="welcome-panel-column welcome-panel-last">
					<a href="https://beapi.fr/" target="_blank">
							<img src="' . $img_src . '" alt="Be API" />
						</a>
				</div>
			</div>
		</div>';
	}
}

new BEA_WELCOME_PANEL();
