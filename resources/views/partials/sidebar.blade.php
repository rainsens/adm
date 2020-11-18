<aside id="sidebar_left" class="nano nano-light affix">
    
    <div class="sidebar-left-content nano-content">
        
        <header class="sidebar-header">
            
            <div class="sidebar-widget author-widget">
                <div class="media">
                    <a class="media-left" href="#">
                        @component('adm::partials.avatar', ['class' => 'img-responsive'])@endcomponent
                    </a>
                    <div class="media-body">
                        <div class="media-links">
                            <a href="#" class="sidebar-menu-toggle">Adm -</a>
                            @component('adm::partials.logout')
                                Logout
                            @endcomponent
                        </div>
                        <div class="media-author">{{ auth()->user()->name }}</div>
                    </div>
                </div>
            </div>
            
            <div class="sidebar-widget menu-widget">
                <div class="row text-center mbn">
                    <div class="col-xs-4">
                        <a href="{{ route('adm.home') }}" class="text-primary" data-toggle="tooltip" data-placement="top" title="Dashboard">
                            <span class="glyphicon glyphicon-home"></span>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="pages_messages.html" class="text-info" data-toggle="tooltip" data-placement="top" title="Messages">
                            <span class="glyphicon glyphicon-inbox"></span>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="pages_profile.html" class="text-alert" data-toggle="tooltip" data-placement="top" title="Tasks">
                            <span class="glyphicon glyphicon-bell"></span>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="pages_timeline.html" class="text-system" data-toggle="tooltip" data-placement="top" title="Activity">
                            <span class="fa fa-desktop"></span>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="pages_profile.html" class="text-danger" data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="fa fa-gears"></span>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="pages_gallery.html" class="text-warning" data-toggle="tooltip" data-placement="top" title="Cron Jobs">
                            <span class="fa fa-flask"></span>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="sidebar-widget search-widget">
                <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-search"></i>
              </span>
                    <input type="text" id="sidebar-search" class="form-control" placeholder="Search...">
                </div>
            </div>
        
        </header>
        
        <ul class="nav sidebar-menu">
            <li class="sidebar-label pt20">Menu</li>
            <li class="active">
                <a href="{{ route('adm.home') }}">
                    <span class="glyphicon glyphicon-home"></span>
                    <span class="sidebar-title">控制页板</span>
                </a>
            </li>
            <li>
                <a class="accordion-toggle" href="#">
                    <span class="fa fa-diamond"></span>
                    <span class="sidebar-title">系统管理</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a href="{{ route('adm.menus.index') }}"><span class="fa fa-cube"></span>菜单管理</a>
                    </li>
                    <li>
                        <a href="widgets_panel.html"><span class="fa fa-desktop"></span> Panel Widgets </a>
                    </li>
                    <li>
                        <a href="widgets_scroller.html"><span class="fa fa-columns"></span> Scroller Widgets </a>
                    </li>
                    <li>
                        <a href="widgets_data.html"><span class="fa fa-dot-circle-o"></span> Admin Widgets</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="accordion-toggle" href="#">
                    <span class="fa fa-diamond"></span>
                    <span class="sidebar-title">业务字典</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a href="widgets_tile.html"><span class="fa fa-cube"></span>楼盘总价字典</a>
                    </li>
                    <li>
                        <a href="widgets_panel.html"><span class="fa fa-desktop"></span> Panel Widgets </a>
                    </li>
                    <li>
                        <a href="widgets_scroller.html"><span class="fa fa-columns"></span> Scroller Widgets </a>
                    </li>
                    <li>
                        <a href="widgets_data.html"><span class="fa fa-dot-circle-o"></span> Admin Widgets</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="accordion-toggle" href="#">
                    <span class="fa fa-diamond"></span>
                    <span class="sidebar-title">楼盘中心</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a href="widgets_tile.html"><span class="fa fa-cube"></span>楼盘管理</a>
                    </li>
                    <li>
                        <a href="widgets_panel.html">
                            <span class="fa fa-desktop"></span> Panel Widgets </a>
                    </li>
                    <li>
                        <a href="widgets_scroller.html">
                            <span class="fa fa-columns"></span> Scroller Widgets </a>
                    </li>
                    <li>
                        <a href="widgets_data.html">
                            <span class="fa fa-dot-circle-o"></span> Admin Widgets </a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="accordion-toggle" href="#">
                    <span class="glyphicon glyphicon-shopping-cart"></span>
                    <span class="sidebar-title">Ecommerce</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li class="active">
                        <a href="ecommerce_dashboard.html">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Dashboard
                            <span class="label label-xs bg-primary">New</span>
                        </a>
                    </li>
                    <li>
                        <a href="ecommerce_products.html">
                            <span class="glyphicon glyphicon-tags"></span> Products </a>
                    </li>
                    <li>
                        <a href="ecommerce_orders.html">
                            <span class="fa fa-money"></span> Orders </a>
                    </li>
                    <li>
                        <a href="ecommerce_customers.html">
                            <span class="fa fa-users"></span> Customers </a>
                    </li>
                    <li>
                        <a href="ecommerce_settings.html">
                            <span class="fa fa-gears"></span> Store Settings </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="email_templates.html">
                    <span class="fa fa-envelope-o"></span>
                    <span class="sidebar-title">Email Templates</span>
                </a>
            </li>
            
            <li>
                <a class="accordion-toggle" href="#">
                    <span class="glyphicon glyphicon-bell"></span>
                    <span class="sidebar-title">UI Elements</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a href="ui_alerts.html">
                            <span class="fa fa-warning"></span> Alerts </a>
                    </li>
                    <li>
                        <a href="ui_animations.html">
                            <span class="fa fa-spinner"></span> Animations </a>
                    </li>
                    <li>
                        <a href="ui_buttons.html">
                            <span class="fa fa-plus-square-o"></span> Buttons </a>
                    </li>
                    <li>
                        <a href="ui_typography.html">
                            <span class="fa fa-text-width"></span> Typography </a>
                    </li>
                    <li>
                        <a href="ui_portlets.html">
                            <span class="fa fa-archive"></span> Portlets </a>
                    </li>
                    <li>
                        <a href="ui_progress-bars.html">
                            <span class="fa fa-bars"></span> Progress Bars </a>
                    </li>
                    <li>
                        <a href="ui_tabs.html">
                            <span class="fa fa-toggle-off"></span> Tabs </a>
                    </li>
                    <li>
                        <a href="ui_icons.html">
                            <span class="fa fa-hand-o-right"></span> Icons </a>
                    </li>
                    <li>
                        <a href="ui_grid.html">
                            <span class="fa fa-th-large"></span> Grid </a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="accordion-toggle" href="#">
                    <span class="glyphicon glyphicon-hdd"></span>
                    <span class="sidebar-title">Form Elements</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a href="form_inputs.html">
                            <span class="fa fa-magic"></span> Basic Inputs </a>
                    </li>
                    <li>
                        <a href="form_plugins.html">
                            <span class="fa fa-bell-o"></span> Plugin Inputs
                            <span class="label label-xs bg-primary">New</span>
                        </a>
                    </li>
                    <li>
                        <a href="form_editors.html">
                            <span class="fa fa-clipboard"></span> Editors </a>
                    </li>
                    <li>
                        <a href="form_treeview.html">
                            <span class="fa fa-tree"></span> Treeview </a>
                    </li>
                    <li>
                        <a href="form_nestable.html">
                            <span class="fa fa-tasks"></span> Nestable </a>
                    </li>
                    <li>
                        <a href="form_image-tools.html">
                            <span class="fa fa-cloud-upload"></span> Image Tools
                            <span class="label label-xs bg-primary">New</span>
                        </a>
                    </li>
                    <li>
                        <a href="form_uploaders.html">
                            <span class="fa fa-cloud-upload"></span> Uploaders </a>
                    </li>
                    <li>
                        <a href="form_notifications.html">
                            <span class="fa fa-bell-o"></span> Notifications </a>
                    </li>
                    <li>
                        <a href="form_content-sliders.html">
                            <span class="fa fa-exchange"></span> Content Sliders </a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="accordion-toggle" href="#">
                    <span class="glyphicon glyphicon-tower"></span>
                    <span class="sidebar-title">Plugins</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a class="accordion-toggle" href="#">
                            <span class="glyphicon glyphicon-globe"></span> Maps
                            <span class="caret"></span>
                        </a>
                        <ul class="nav sub-nav">
                            <li>
                                <a href="maps_advanced.html">Admin Maps</a>
                            </li>
                            <li>
                                <a href="maps_basic.html">Basic Maps</a>
                            </li>
                            <li>
                                <a href="maps_vector.html">Vector Maps</a>
                            </li>
                            <li>
                                <a href="maps_full.html">Full Map</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="accordion-toggle" href="#">
                            <span class="fa fa-area-chart"></span> Charts
                            <span class="caret"></span>
                        </a>
                        <ul class="nav sub-nav">
                            <li>
                                <a href="charts_highcharts.html">Highcharts</a>
                            </li>
                            <li>
                                <a href="charts_d3.html">D3 Charts</a>
                            </li>
                            <li>
                                <a href="charts_flot.html">Flot Charts</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="accordion-toggle" href="#">
                            <span class="fa fa-table"></span> Tables
                            <span class="caret"></span>
                        </a>
                        <ul class="nav sub-nav">
                            <li>
                                <a href="tables_basic.html"> Basic Tables</a>
                            </li>
                            <li>
                                <a href="tables_datatables.html"> DataTables </a>
                            </li>
                            <li>
                                <a href="tables_datatables-editor.html"> Editable Tables </a>
                            </li>
                            <li>
                                <a href="tables_pricing.html"> Pricing Tables </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="accordion-toggle" href="#">
                            <span class="fa fa-flask"></span> Misc
                            <span class="caret"></span>
                        </a>
                        <ul class="nav sub-nav">
                            <li>
                                <a href="misc_tour.html"> Site Tour</a>
                            </li>
                            <li>
                                <a href="misc_timeout.html"> Session Timeout</a>
                            </li>
                            <li>
                                <a href="misc_nprogress.html"> Page Progress Loader </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a class="accordion-toggle" href="#">
                    <span class="glyphicon glyphicon-duplicate"></span>
                    <span class="sidebar-title">Pages</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a class="accordion-toggle" href="#">
                            <span class="fa fa-gears"></span> Utility
                            <span class="caret"></span>
                        </a>
                        <ul class="nav sub-nav">
                            <li>
                                <a href="landing-page/landing1/index.html" target="_blank"> Landing Page </a>
                            </li>
                            <li>
                                <a href="pages_confirmation.html" target="_blank"> Confirmation
                                    <span class="label label-xs bg-primary">New</span>
                                </a>
                            </li>
                            <li>
                                <a href="pages_login.html" target="_blank"> Login </a>
                            </li>
                            <li>
                                <a href="pages_login(alt).html" target="_blank"> Login Alt
                                    <span class="label label-xs bg-primary">New</span>
                                </a>
                            </li>
                            <li>
                                <a href="pages_register.html" target="_blank"> Register </a>
                            </li>
                            <li>
                                <a href="pages_register(alt).html" target="_blank"> Register Alt
                                    <span class="label label-xs bg-primary">New</span>
                                </a>
                            </li>
                            <li>
                                <a href="pages_screenlock.html" target="_blank"> Screenlock </a>
                            </li>
                            <li>
                                <a href="pages_screenlock(alt).html" target="_blank"> Screenlock Alt
                                    <span class="label label-xs bg-primary">New</span>
                                </a>
                            </li>
                            <li>
                                <a href="pages_forgotpw.html" target="_blank"> Forgot Password </a>
                            </li>
                            <li>
                                <a href="pages_forgotpw(alt).html" target="_blank"> Forgot Pass Alt
                                    <span class="label label-xs bg-primary">New</span>
                                </a>
                            </li>
                            <li>
                                <a href="pages_coming-soon.html" target="_blank"> Coming Soon
                                </a>
                            </li>
                            <li>
                                <a href="pages_404.html"> 404 Error </a>
                            </li>
                            <li>
                                <a href="pages_500.html"> 500 Error </a>
                            </li>
                            <li>
                                <a href="pages_404(alt).html"> 404 Error Alt </a>
                            </li>
                            <li>
                                <a href="pages_500(alt).html"> 500 Error Alt </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="accordion-toggle" href="#">
                            <span class="fa fa-desktop"></span> Basic
                            <span class="caret"></span>
                        </a>
                        <ul class="nav sub-nav">
                            <li>
                                <a href="pages_search-results.html">Search Results
                                    <span class="label label-xs bg-primary">New</span>
                                </a>
                            </li>
                            <li>
                                <a href="pages_profile.html"> Profile </a>
                            </li>
                            <li>
                                <a href="pages_timeline.html"> Timeline Split </a>
                            </li>
                            <li>
                                <a href="pages_timeline-single.html"> Timeline Single </a>
                            </li>
                            <li>
                                <a href="pages_faq.html"> FAQ Page </a>
                            </li>
                            <li>
                                <a href="pages_calendar.html"> Calendar </a>
                            </li>
                            <li>
                                <a href="pages_messages.html"> Messages </a>
                            </li>
                            <li>
                                <a href="pages_messages(alt).html"> Messages Alt </a>
                            </li>
                            <li>
                                <a href="pages_gallery.html"> Gallery </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="accordion-toggle" href="#">
                            <span class="fa fa-usd"></span> Misc
                            <span class="caret"></span>
                        </a>
                        <ul class="nav sub-nav">
                            <li>
                                <a href="pages_invoice.html"> Printable Invoice </a>
                            </li>
                            <li>
                                <a href="pages_blank.html"> Blank </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
        
        <div class="sidebar-toggle-mini">
            <a href="#">
                <span class="fa fa-sign-out"></span>
            </a>
        </div>
    
    </div>

</aside>
