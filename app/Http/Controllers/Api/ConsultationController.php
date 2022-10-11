<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\KeywordResource;
use App\Models\Category;
use App\Models\KeyWord;
use App\Models\Payment;
use App\Models\Placetype;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class ConsultationController extends BaseController
{
    public function consultation_category(){
        $category = Category::ofType('consultation')->orderBy('id', 'asc')->get();
        $userRes = KeywordResource::collection($category);
        return $this->sendResponse($userRes, 'جميع الكلمات المفتاحية الخاصة بالاستشارات');
    }
    public function consultation_keyword(){
        $category = KeyWord::ofType('consultation')->orderBy('id', 'asc')->get();
        $userRes = KeywordResource::collection($category);
        return $this->sendResponse($userRes, 'جميع الكلمات المفتاحية الخاصة بالاستشارات');
    }
    public function places(){
        $category = Placetype::orderBy('id', 'asc')->get();
        $userRes = KeywordResource::collection($category);
        return $this->sendResponse($userRes, 'جميع الاماكن لعرض الاستشارة ');
    }
    public function payments(){
        $category = Payment::orderBy('id', 'asc')->get();
        $userRes = KeywordResource::collection($category);
        return $this->sendResponse($userRes, 'جميع طرق الدفع المتاحة ');
    }

}
