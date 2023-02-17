<?php
    /**
     * Created by PhpStorm.
     * User: fatfish
     * Date: 16/7/18
     * Time: 4:57 PM
     */

    namespace dominicvonk\navigation\variables;
    use dominicvonk\navigation\Navigation;
    use Craft;
    use craft\web\View;
    class NavigationVariable
    {


        public function render($MenuName, array $options=[])
        {


           $oldMode= Craft::$app->view->getTemplateMode();
           Craft::$app->view->setTemplateMode(View::TEMPLATE_MODE_CP);
           $html=Craft::$app->view->renderTemplate('craftnavigation/_renderMenu/index',['MenuNodes'=>Navigation::$plugin->navigationService->GetNavigationByName($MenuName),'menucss'=>$options]);
           Craft::$app->view->setTemplateMode($oldMode);
           echo $html;

        }

        /**
         * @param $NodeId object
         * @return array
         */
        public function renderChildren($NodeId)
        {

            $id=$NodeId->NodeId;
            $menuid=$NodeId->menuId;

          return Navigation::$plugin->navigationService->GetChild($id,$menuid);

        }

        public function getRawNav($HandleName)
        {
            return Navigation::$plugin->navigationService->GetNavigationByName($HandleName);
        }



    }
