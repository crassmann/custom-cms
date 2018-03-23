<?php

namespace app\controllers\admin;

use app\config;
use \core\view;

/**
 * Page controller
 *
 * PHP version 7.0
 */
class page extends \app\controllers\page
{
  /**
   * Shows all Pages
   *
   * @return void
   */
  public function indexAction() {
    $page = new \app\models\page();
    if ($this->route_params['page'] = $page::getPages()) {
      view::renderTemplate(config::DEFAULT_TEMPLATE, $this->route_params['controller'].'/'.$this->route_params['action'], $this->route_params);
    } else {
      $this->errorAction();
    }
  }

  /**
   * Edits a navigation items
   *
   * @return void
   */
  public function editAction() {

    if ( isset($this->route_params['request']) ) {
      $page = new \app\models\page();

      // If the delete form is submitted
      if (isset($_POST["deleteItem"])) {
        $this->route_params['deleteItem'] = $_POST["deleteItem"];
        view::renderTemplate(config::DEFAULT_TEMPLATE, 'page/delete', $this->route_params);
      }
      // If the add form is submitted
      if (isset($_POST["add_item"]) && !empty($_POST["add_item"])) {
        $this->route_params['addItem'] = $page::addItem($this->route_params['request'], $_POST["add_item"]);
      }

      // If the save form is submitted
      if (isset($_POST["save"])) {
        $this->route_params['items'] = $page::getPageItems($this->route_params['request']);
        foreach ($this->route_params['items'] as $key => $value) {
          if ($value['position'] != $_POST[$value['page_id']]['position']) {
            $page::updatePageItem($value['page_id'], $_POST[$value['page_id']]['position']);
          }
        }
      }

      $url = new \app\models\url();
      $this->route_params['url'] = $url::getUrlById($this->route_params['request']);
      $item = new \app\models\item();
      $this->route_params['item'] = $item::getItems();
      if ($this->route_params['items'] = $page::getPageItems($this->route_params['request'])) {
        view::renderTemplate(config::DEFAULT_TEMPLATE, 'page/edit', $this->route_params);
      } else {
        view::renderTemplate(config::DEFAULT_TEMPLATE, 'page/new', $this->route_params);
      }
    } else {
      $this->errorAction();
    }
  }

  /**
   * Deletes an item
   *
   * @return void
   */
  public function deleteAction() {
    // If the delete form is submitted
    if (isset($_POST["delete"])) {
      $page = new \app\models\page();
      if ($this->route_params['page'] = $page::deleteItem($_POST["delete"])) {
        header("Location: ".config::ROOT_APP_DIR."page/edit/".$this->route_params['request']);
      } else {
        $this->errorAction();
      }
    }
  }

}
