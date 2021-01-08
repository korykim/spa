<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $order_from_id
 * @property string $idcard_app_key
 * @property string $idcard_secret_key
 * @property string $idcard_access_token
 * @property string $shop_name
 * @property string $create_time
 * @property string $update_time
 * @property boolean $is_activity
 * @property string $app_key
 * @property string $secret_key
 * @property string $access_token
 */
class OrderFrom extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'yd_order_from';

    /**
     * @var array
     */
    protected $fillable = ['order_from_id', 'idcard_app_key', 'idcard_secret_key', 'idcard_access_token', 'shop_name', 'create_time', 'update_time', 'is_activity', 'app_key', 'secret_key', 'access_token'];

}
