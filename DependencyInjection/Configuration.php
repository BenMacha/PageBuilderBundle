<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Benmacha\PageBuilderBundle\DependencyInjection;

use FOS\UserBundle\Form\Type;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This class contains the configuration information for the bundle.
 *
 * This information is solely responsible for how the different configuration
 * sections are normalized, and merged.
 *
 * @author Christophe Coevoet <stof@notk.org>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();

        if (method_exists($treeBuilder, 'getRootNode')) {
            $rootNode = $treeBuilder->getRootNode();
        } else {
            $rootNode = $treeBuilder->root('benmacha_page_builder');
        }



        $rootNode
            ->children()
            ->scalarNode('page_class')->isRequired()->cannotBeEmpty()->end()
            //->scalarNode('project_class')->isRequired()->cannotBeEmpty()->end()
            //->scalarNode('version_class')->isRequired()->cannotBeEmpty()->end()
            ->end();

        return $treeBuilder;
    }
}
