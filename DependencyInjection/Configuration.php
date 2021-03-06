<?php

namespace Wrep\Bundle\NotificatoBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
	/**
	 * {@inheritDoc}
	 */
	public function getConfigTreeBuilder()
	{
		$treeBuilder = new TreeBuilder();

		$treeBuilder->root('notificato')
			->children()
				->arrayNode('apns')
				->addDefaultsIfNotSet()
					->children()
						->arrayNode('certificate')
						->addDefaultsIfNotSet()
							->children()
								->scalarNode('pem')->defaultValue(null)->end()
								->scalarNode('passphrase')->defaultValue(null)->end()
								->scalarNode('validate')->defaultValue(true)->end()
								->scalarNode('environment')->defaultValue('production')->end()
							->end()
						->end()
					->end()
				->end()
			->end();

		return $treeBuilder;
	}
}
