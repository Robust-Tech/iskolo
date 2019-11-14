 <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="<?=base_url()?>">Home</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span><?=('Messages')?></span>
                                </li>
                            </ul>
                        </div>
  <h1 class="page-title"> <?=('Messages')?></h1>
<div class="inbox">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="inbox-sidebar">
                                        <a ref="<?=base_url()?>messages/send/?group=sent" title="<?='Send message'?>" data-placement="top" data-title="Compose" class="btn red compose-btn btn-block">
                                            <i class="fa fa-edit"></i> Compose </a>
                                        <ul class="inbox-nav">
                                            <li class="<?php echo ($group == 'inbox') ? 'active' : '';?>"  data-type="inbox" data-title="Inbox">
                          <a href="<?=base_url()?>messages?group=inbox"> <i class="fa fa-fw fa-envelope"></i>
                            <?='Inbox'?>
                          </a>
                        </li>
                        <li class="<?php echo ($group == 'sent') ? 'active' : '';?>" data-type="sent" data-title="Sent">
                          <a href="<?=base_url()?>messages?group=sent"> <i class="fa fa-fw fa-exchange"></i>
                            <?='Sent'?>
                          </a>
                        </li>
                        <li class="<?php echo ($group == 'favourites') ? 'active' : '';?>" data-type="favourites" data-title="Favourites">
                          <a href="<?=base_url()?>messages?group=favourites"> <i class="fa fa-fw fa-star"></i>
                            <?='Favourites'?>
                          </a>
                        </li>
                        <li class="<?php echo ($group == 'trash') ? 'active' : '';?>" data-type="trash" data-title="Trash">
                          <a href="<?=base_url()?>messages?group=trash"> <i class="fa fa-fw fa-trash-o"></i>
                            <?='Trash'?>
                          </a>
                        </li>
                                        </ul>  
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="inbox-body">
                                        <div class="inbox-header">
                                            <div class="row m-t-sm">
							<div class="col-sm-8 m-b-xs">
                                 <h1 class="pull-left"><?=('Messages')?></h1>
							</div>
							<div class="col-sm-4 m-b-xs">
								<?php echo form_open(base_url().'messages/search/','class="form-inline pull-right"'); ?>
								<div class="input-group input-medium">
									<input type="text" class="form-control" name="keyword" placeholder="<?='keyword'?>">
									<span class="input-group-btn"> <button class="btn green" type="submit"><i class="fa fa-search"></i></button>
									</span>
								</div>
							<?=form_close()?>
						</div>
					</div>
                                        </div>
                                        <div class="inbox-content"> 							<?php $this->load->helper('text'); ?>
							<ul class="list-group no-radius m-b-none m-t-n-xxs list-group-alt list-group-lg">
								<?php
									$group = isset($_GET['group']) ? $_GET['group'] : FALSE;
									switch ($group) {
										case 'sent':
											$this->load->view('group/sent');
											break;
										case 'inbox':
											$this->load->view('group/inbox',$messages);
											break;
										case 'favourites':
											$this->load->view('group/favourites');
											break;
										case 'trash':
											$this->load->view('group/trash');
											break;
										default:
											$this->load->view('group/inbox');
											break;
									}
								 ?>

								</ul></div>
                                    </div>
                                </div>
                            </div>
                        </div>