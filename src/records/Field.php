<?php
/**
 * @link      https://craftcms.com/
 * @copyright Copyright (c) Pixel & Tonic, Inc.
 * @license   https://craftcms.com/license
 */

namespace craft\records;

use craft\db\ActiveRecord;
use yii\db\ActiveQueryInterface;

/**
 * Class Field record.
 *
 * @property integer    $id                   ID
 * @property integer    $groupId              Group ID
 * @property string     $name                 Name
 * @property string     $handle               Handle
 * @property string     $context              Context
 * @property string     $instructions         Instructions
 * @property boolean    $translatable         Translatable
 * @property string     $translationMethod    Translation method
 * @property string     $translationKeyFormat Translation key format
 * @property string     $type                 Type
 * @property array      $settings             Settings
 * @property FieldGroup $group                Group
 *
 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since  3.0
 */
class Field extends ActiveRecord
{
    // Properties
    // =========================================================================

    /**
     * @var
     */
    private $_oldHandle;

    // Public Methods
    // =========================================================================

    /**
     * Initializes the application component.
     *
     * @return void
     */
    public function init()
    {
        parent::init();

        // Store the old handle in case it's ever requested.
        $this->on(self::EVENT_AFTER_FIND, [$this, 'storeOldHandle']);
    }

    /**
     * Store the old handle.
     *
     * @return void
     */
    public function storeOldHandle()
    {
        $this->_oldHandle = $this->handle;
    }

    /**
     * Returns the old handle.
     *
     * @return string
     */
    public function getOldHandle()
    {
        return $this->_oldHandle;
    }

    /**
     * @inheritdoc
     *
     * @return string
     */
    public static function tableName()
    {
        return '{{%fields}}';
    }

    /**
     * Returns the field’s group.
     *
     * @return ActiveQueryInterface The relational query object.
     */
    public function getGroup()
    {
        return $this->hasOne(FieldGroup::class, ['id' => 'groupId']);
    }
}