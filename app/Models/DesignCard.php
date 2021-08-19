<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class DesignCard extends Model
{
    use HasFactory;

    protected $fillable = [
        "customer_id",
        "label",
        "date",
        "front_image",
        "back_image",
        "all_view_image",
        "design_file",
        "designer_id",
        "salesrep_id",
        "weaver",
        "warps_id",
        "finishing",
        "description",
        "main_label",
        "tab_label",
        "size_label",
        "add_on_main_cost",
        "add_on_tab_cost",
        "add_on_size_cost",
        "needle",
        "speed_effiency",
        "customer_grade",
        "category",
        "chart",
    ];

     public function getWeaverAttribute($value)
    {
        $weaver = json_decode($value, true);

        return is_array($weaver) && count($weaver) > 0
            ? $weaver
            : [];
    }

    public function getMainLabelAttribute($value)
    {
        $mainLabel = json_decode($value, true);

        return is_array($mainLabel) && count($mainLabel) > 0
            ? $mainLabel
            : [];
    }

    public function getTabLabelAttribute($value)
    {
        $tabLabel = json_decode($value, true);

        return is_array($tabLabel) && count($tabLabel) > 0
            ? $tabLabel
            : [];
    }

    public function getSizeLabelAttribute($value)
    {
        $tabLabel = json_decode($value, true);

        return is_array($tabLabel) && count($tabLabel) > 0
            ? $tabLabel
            : [];
    }

    public function getAddOnMainCostAttribute($value)
    {
        $addOnMainCost = json_decode($value, true);

        return is_array($addOnMainCost) && count($addOnMainCost) > 0
            ? $addOnMainCost
            : [];
    }

    public function getAddOnTabCostAttribute($value)
    {
        $addOnTabCost = json_decode($value, true);

        return is_array($addOnTabCost) && count($addOnTabCost) > 0
            ? $addOnTabCost
            : [];
    }

    public function getAddOnSizeCostAttribute($value)
    {
        $addOnTabCost = json_decode($value, true);

        return is_array($addOnTabCost) && count($addOnTabCost) > 0
            ? $addOnTabCost
            : [];
    }

    public function getNeedleAttribute($value)
    {
        $needle = json_decode($value, true);

        return is_array($needle) && count($needle) > 0
            ? $needle
            : [];
    }

    // public function getDesignFileAttribute($value)
    // {
    //     $designFile = json_decode($value, true);

    //     return is_array($designFile) && count($designFile) > 0
    //         ? $designFile
    //         : [];
    // }

    public function getFrontImageAttribute($value)
    {
        $existsFile = Storage::disk("cardsImage")->exists("{$value}");
        return $value && $existsFile ? Storage::disk("cardsImage")->url('/')."{$value}" : "";
    }

    public function getBackImageAttribute($value)
    {
        $existsFile = Storage::disk("cardsImage")->exists("{$value}");
        return $value && $existsFile ? Storage::disk("cardsImage")->url('/')."{$value}" : "";
    }

    public function getAllViewImageAttribute($value)
    {
        $existsFile = Storage::disk("cardsImage")->exists("{$value}");
        return $value && $existsFile ? Storage::disk("cardsImage")->url('/')."{$value}" : "";
    }

    public function customerDetail()
    {
        return $this->hasOne(CustomerMaster::class,'id','customer_id');
    }

    
    public function designerDetail()
    {
        return $this->hasOne(Staf_master::class,'id','designer_id')->where('role_id',1);
    }

    public function salesRepDetail()
    {
        return $this->hasOne(Staf_master::class,'id','salesrep_id')->where('role_id',2);
    }

    public function warpDetail()
    {
        return $this->hasOne(WarpMaster::class,'id','warps_id');
    }

    public function finishingDetail()
    {
        return $this->hasOne(FinishingMachineMaster::class,'id','finishing_id');
    }          
}
