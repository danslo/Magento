<?php

/**
 * Copyright (c) 2012, Mollie B.V.
 * All rights reserved. 
 * 
 * Redistribution and use in source and binary forms, with or without 
 * modification, are permitted provided that the following conditions are met: 
 * 
 * - Redistributions of source code must retain the above copyright notice, 
 *    this list of conditions and the following disclaimer.
 * - Redistributions in binary form must reproduce the above copyright 
 *    notice, this list of conditions and the following disclaimer in the
 *    documentation and/or other materials provided with the distribution.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE AUTHOR AND CONTRIBUTORS ``AS IS'' AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED 
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE 
 * DISCLAIMED. IN NO EVENT SHALL THE AUTHOR OR CONTRIBUTORS BE LIABLE FOR ANY 
 * DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES 
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR 
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER 
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT 
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY 
 * OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH 
 * DAMAGE. 
 *
 * @category    Mollie
 * @package     Mollie_Mpm
 * @author      Mollie B.V. (info@mollie.nl)
 * @version     v3.5.0
 * @copyright   Copyright (c) 2012 Mollie B.V. (http://www.mollie.nl)
 * @license     http://www.opensource.org/licenses/bsd-license.php  Open Software License (OSL 3.0)
 * 
 **/

$installer = $this;

$installer->startSetup();

$installer->run(
	sprintf("DROP TABLE IF EXISTS `%s`",
		$installer->getTable('mollie_payments')
	)
);

$installer->run("DELETE FROM `{$installer->getTable('core_config_data')}` where `path` = 'mollie/idl/active';
	DELETE FROM `{$installer->getTable('core_config_data')}` where `path` = 'mollie/idl/description';
	DELETE FROM `{$installer->getTable('core_config_data')}` where `path` = 'mollie/idl/minvalue';
	DELETE FROM `{$installer->getTable('core_config_data')}` where `path` = 'mollie/idl/testmode';
	DELETE FROM `{$installer->getTable('core_config_data')}` where `path` = 'mollie/settings/partnerid';
	DELETE FROM `{$installer->getTable('core_config_data')}` where `path` = 'mollie/settings/profilekey';
	DELETE FROM `{$installer->getTable('core_resource')}` where `code` = 'mpm_setup';"
);

$installer->endSetup();