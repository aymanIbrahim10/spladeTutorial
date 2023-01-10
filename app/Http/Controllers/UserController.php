<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeQueryBuilder;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
class UserController extends Controller
{
    public function index()
    {
        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query
                        ->orWhere('name', 'LIKE', "%{$value}%")
                        ->orWhere('email', 'LIKE', "%{$value}%");
                });
            });
        });

        $users = QueryBuilder::for(User::class)
        ->defaultSort('name')
        ->allowedSorts(['name', 'email'])
        ->allowedFilters(['name', 'email','language_code',$globalSearch])
        ->paginate()
        ->withQueryString();
        return view('user.index',
    [
        'users' => SpladeTable::for($users)
        ->defaultSort('name')
        ->withGlobalSearch()
        ->column('name',label: 'الاسم',sortable:true ,searchable:true,canBeHidden:false)
        ->column('email',label: 'الايميل',sortable:true ,searchable:true)
        ->column('language_code',label: 'اللغة')
        ->column('action')
        ->rowLink(function(User $user){
            return route('user.show', $user);
        })
        ->selectFilter(key: 'language_code', label: 'Language', options: [
            'en' => 'English',
            'nl' => 'Dutch',
        ]),
    ]);
    }
    public function show(User $user)
    {
        return view('user.show', ['user' => $user]);
    }
    public function edit(User $user)
    {
        return view('user.edit', [
            'user' => $user ,
            'countries' => [
                'be' => 'Belgium',
                'nl' => 'The Netherlands',
                 'BW'=>'Botswana',
                 'KH'=>'Cambodia',
              'CM'=>'Cameroon',
              'CA'=>'Canada',
              'CV'=>'Cape Verde',
              'KY'=>'Cayman Islands',
              'CF'=>'Central African Republic',
              'TD'=>'Chad',
              'CL'=>'Chile',
              'CN'=>'China',
            ]
        ]);
    }
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:100'],
            'roles' => ['required', 'array', 'min:2'],
        ]);
        $user->update($data);
        // Toast::center('Welcome back!');
        Toast::title('تم التحديث بنجاح')
            ->message('No space left')
            ->warning()
            ->leftTop()
            ->backdrop()
            ->autoDismiss(3);
        return redirect()->route('user.show', $user);
    }
}
