<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'webinar_id' => 'required',
            'content_quality' => 'required',
            'instructor_skills' => 'required',
            'purchase_worth' => 'required',
            'support_quality' => 'required',
        ]);

        $data = $request->all();
        $user = auth()->user();

        $order = Order::where('id', $data['order_id'])->first();

        if (!empty($order)) {
            if ($order->checkUserHasBought($user, false)) {
                $webinarReview = Rating::where('creator_id', $user->id)
                    ->where('order_id', $order->id)
                    ->first();

                if (!empty($webinarReview)) {
                    $toastData = [
                        'title' => trans('public.request_failed'),
                        'msg' => trans('public.duplicate_review_for_webinar'),
                        'status' => 'error'
                    ];
                    return back()->with(['toast' => $toastData]);
                }

                $rates = 0;
                $rates += (int)$data['content_quality'];
                $rates += (int)$data['instructor_skills'];
                $rates += (int)$data['purchase_worth'];
                $rates += (int)$data['support_quality'];

                $status = Comment::$pending;
                if (!empty(getGeneralOptionsSettings('direct_publication_of_reviews'))) {
                    $status = Comment::$active;
                }

                WebinarReview::create([
                    'webinar_id' => $webinar->id,
                    'creator_id' => $user->id,
                    'content_quality' => (int)$data['content_quality'],
                    'instructor_skills' => (int)$data['instructor_skills'],
                    'purchase_worth' => (int)$data['purchase_worth'],
                    'support_quality' => (int)$data['support_quality'],
                    'rates' => $rates > 0 ? $rates / 4 : 0,
                    'description' => $data['description'],
                    'status' => $status,
                    'created_at' => time(),
                ]);


                $notifyOptions = [
                    '[c.title]' => $webinar->title,
                    '[item_title]' => $webinar->title,
                    '[student.name]' => $user->full_name,
                    '[u.name]' => $user->full_name,
                    '[rate.count]' => $rates > 0 ? $rates / 4 : 0,
                    '[content_type]' => trans('admin/main.course'),
                ];
                sendNotification('new_rating', $notifyOptions, $webinar->teacher_id);
                sendNotification('new_user_item_rating', $notifyOptions, 1);

                $toastData = [
                    'title' => trans('public.request_success'),
                    'msg' => ($status == Comment::$active) ? trans('webinars.your_reviews_successfully_submitted') : trans('webinars.your_reviews_successfully_submitted_and_waiting_for_admin'),
                    'status' => 'success'
                ];
                return back()->with(['toast' => $toastData]);
            } else {
                $toastData = [
                    'title' => trans('public.request_failed'),
                    'msg' => trans('cart.you_not_purchased_this_course'),
                    'status' => 'error'
                ];
                return back()->with(['toast' => $toastData]);
            }
        }

        $toastData = [
            'title' => trans('public.request_failed'),
            'msg' => trans('cart.course_not_found'),
            'status' => 'error'
        ];
        return back()->with(['toast' => $toastData]);
    }
}
