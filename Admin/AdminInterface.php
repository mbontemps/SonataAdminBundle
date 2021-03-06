<?php

/*
 * This file is part of the Sonata package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Pool;
use Sonata\AdminBundle\Admin\FieldDescriptionInterface;
use Sonata\AdminBundle\Builder\FormContractorInterface;
use Sonata\AdminBundle\Builder\ListBuilderInterface;
use Sonata\AdminBundle\Builder\DatagridBuilderInterface;
use Sonata\AdminBundle\Security\Handler\SecurityHandlerInterface;
use Sonata\AdminBundle\Builder\RouteBuilderInterface;
use Sonata\AdminBundle\Translator\LabelTranslatorStrategyInterface;

use Knp\Menu\FactoryInterface as MenuFactoryInterface;

use Symfony\Component\Validator\ValidatorInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Translation\TranslatorInterface;
use Symfony\Component\HttpFoundation\Request;

interface AdminInterface
{
    /**
     * @abstract
     * @param \Sonata\AdminBundle\Builder\FormContractorInterface $formContractor
     * @return void
     */
    function setFormContractor(FormContractorInterface $formContractor);

    /**
     * @abstract
     * @param ListBuilderInterface $listBuilder
     * @return void
     */
    function setListBuilder(ListBuilderInterface $listBuilder);

    /**
     * @abstract
     * @param \Sonata\AdminBundle\Builder\DatagridBuilderInterface $datagridBuilder
     * @return void
     */
    function setDatagridBuilder(DatagridBuilderInterface $datagridBuilder);

    /**
     * @abstract
     * @param \Symfony\Component\Translation\TranslatorInterface $translator
     * @return void
     */
    function setTranslator(TranslatorInterface $translator);

    /**
     * @abstract
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return void
     */
    function setRequest(Request $request);

    /**
     * @abstract
     * @param Pool $pool
     * @return void
     */
    function setConfigurationPool(Pool $pool);

    /**
     * @abstract
     * @param \Symfony\Component\Routing\RouterInterface $router
     * @return void
     */
    function setRouter(RouterInterface $router);

    /**
     * Returns the class name managed
     *
     * @abstract
     * @return void
     */
    function getClass();

    /**
     * @abstract
     * @param \Sonata\AdminBundle\Admin\FieldDescriptionInterface $fieldDescription
     * @return void
     */
    function attachAdminClass(FieldDescriptionInterface $fieldDescription);

    /**
     * @abstract
     * @return \Sonata\AdminBundle\Datagrid\DatagridInterface
     */
    function getDatagrid();

    /**
     * @abstract
     * @param string $name
     * @param array $parameters
     * @return void
     */
    function generateUrl($name, array $parameters = array());

    /**
     * @abstract
     * @return \Sonata\AdminBundle\ModelManagerInterface;
     */
    function getModelManager();

    /**
     * @abstract
     * @return \Sonata\AdminBundle\Datagrid\ProxyQueryInterface
     */
    function createQuery($context = 'list');

    /**
     *
     * @return \Symfony\Component\Form\FormBuilder the form builder
     */
    function getFormBuilder();

    /**
     * @abstract
     * @param string $name
     * @return \Sonata\AdminBundle\Admin\FieldDescriptionInterface
     */
    function getFormFieldDescription($name);

    /**
     * @abstract
     * @return \Symfony\Component\HttpFoundation\Request
     */
    function getRequest();

    /**
     *
     * @return string
     */
    function getCode();

    /**
     * @abstract
     * @return array
     */
    function getSecurityInformation();

    /**
     * @abstract
     * @param \Sonata\AdminBundle\Admin\FieldDescriptionInterface $parentFieldDescription
     * @return void
     */
    function setParentFieldDescription(FieldDescriptionInterface $parentFieldDescription);

    /**
     * translate a message id
     *
     * @param string $id
     * @param array $parameters
     * @param null $domain
     * @param null $locale
     * @return string the translated string
     */
    function trans($id, array $parameters = array(), $domain = null, $locale = null);

    /**
     * Return the parameter name used to represente the id in the url
     *
     * @abstract
     * @return string
     */
    function getRouterIdParameter();

    /**
     * add a FieldDescription
     *
     * @param string $name
     * @param \Sonata\AdminBundle\Admin\FieldDescriptionInterface $fieldDescription
     * @return void
     */
     function addShowFieldDescription($name, FieldDescriptionInterface $fieldDescription);

    /**
     * add a list FieldDescription
     *
     * @param string $name
     * @param \Sonata\AdminBundle\Admin\FieldDescriptionInterface $fieldDescription
     * @return void
     */
     function addListFieldDescription($name, FieldDescriptionInterface $fieldDescription);

    /**
     * add a filter FieldDescription
     *
     * @param string $name
     * @param \Sonata\AdminBundle\Admin\FieldDescriptionInterface $fieldDescription
     * @return void
     */
    function addFilterFieldDescription($name, FieldDescriptionInterface $fieldDescription);

    /**
     * Returns a list depend on the given $object
     *
     * @return \Sonata\AdminBundle\Admin\FieldDescriptionCollection
     */
    function getList();

    /**
     * @param \Sonata\AdminBundle\Security\Handler\SecurityHandlerInterface $securityHandler
     * @return void
     */
    function setSecurityHandler(SecurityHandlerInterface $securityHandler);

    /**
     * @return \Sonata\AdminBundle\Security\Handler\SecurityHandlerInterface|null
     */
    function getSecurityHandler();

    /**
     * @param string $name
     * @param object|null $object
     * @return boolean
     */
    function isGranted($name, $object = null);

    /**
     * @abstract
     * @param $entity
     */
    function getNormalizedIdentifier($entity);

    /**
     * Shorthand method for templating
     *
     * @param object $entity
     * @return mixed
     */
    function id($entity);

    /**
     * @param \Symfony\Component\Validator\ValidatorInterface $validator
     * @return void
     */
    function setValidator(ValidatorInterface $validator);

    /**
     * @return \Symfony\Component\Validator\ValidatorInterface
     */
    function getValidator();

    /**
     * @return array
     */
    function getShow();

    /**
     * @param array $formTheme
     * @return void
     */
    function setFormTheme(array $formTheme);

    /**
     * @return array
     */
    function getFormTheme();

    /**
     * @param array $filterTheme
     * @return void
     */
    function setFilterTheme(array $filterTheme);

    /**
     * @return array
     */
    function getFilterTheme();

    /**
     * @param AdminExtensionInterface $extension
     * @return void
     */
    function addExtension(AdminExtensionInterface $extension);

    /**
     * @param \Knp\Menu\FactoryInterface $menuFactory
     * @return void
     */
    function setMenuFactory(MenuFactoryInterface $menuFactory);

    /**
     * @return \Knp\Menu\FactoryInterface
     */
    function getMenuFactory();

    /**
     * @param \Sonata\AdminBundle\Builder\RouteBuilderInterface $routeBuilder
     */
    function setRouteBuilder(RouteBuilderInterface $routeBuilder);

    /**
     * @return \Sonata\AdminBundle\Builder\RouteBuilderInterface
     */
    function getRouteBuilder();

    /**
     * @param $object
     * @return string
     */
    function toString($object);

    /**
     * @param \Sonata\Adminbundle\Translator\LabelTranslatorStrategyInterface $labelTranslatorStrategy
     */
    function setLabelTranslatorStrategy(LabelTranslatorStrategyInterface $labelTranslatorStrategy);

    /**
     * @return \Sonata\AdminBundle\Translator\LabelTranslatorStrategyInterface
     */
    function getLabelTranslatorStrategy();

    /**
     * add an Admin child to the current one
     *
     * @param \Sonata\AdminBundle\Admin\AdminInterface $child
     * @return void
     */
    function addChild(AdminInterface $child);

    /**
     * Returns true or false if an Admin child exists for the given $code
     *
     * @param string $code Admin code
     * @return bool True if child exist, false otherwise
     */
    function hasChild($code);

    /**
     * Returns an collection of admin children
     *
     * @return array list of Admin children
     */
    function getChildren();

    /**
     * Returns an admin child with the given $code
     *
     * @param string $code
     * @return array|null
     */
    function getChild($code);

    /**
     * @return object a new object instance
     */
    function getNewInstance();
}
