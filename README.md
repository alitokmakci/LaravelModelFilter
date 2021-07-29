A Simple Query Filter Builder for Laravel Eloquent Models

##### Install:

```
composer require alitokmakci/model-filter
```

##### Creating Filters:

```
php artisan make:filter {queryName}
```

This command will generate a Filter class in app/Http/Filter directory.

PS: You can use 1 filter for which models you want.

For example:

If you have status column on User model and Transaction model,
you can use the Status filter for both User and Transaction models.

Filters are working with column names not with models itself! Feel free to use them!

##### Usage:

```
use ModelFilter\ModelFilter;

public function index()
{
    $users = ModelFilter::filter(App\Models\User::class,
        [
            App\Http\Filters\Email::class,
            App\Http\Filters\Status::class
        ]
    )->get();
    
    return response($users);
}
```

#### Examples:
For given code above:
###### 1
Url: `/users?email=example@example.com`

Executed SQL: ```"select * from `users` where `email` = ?"```

###### 2
Url: `/users?email=example@example.com&status=1`

Executed SQL: ```"select * from `users` where `email` = ? and `status` = ?"```

##### Methods:
There is only one available method:

###### filter(string $model, array $filters)
returns Laravel QueryBuilder so you can chain all Eloquent methods

##### Customizing Filters:
Filters are automatically sets column name and query name from its name so you don't have to write any code after creating Filter Object! Yay!

If you want to customize the filter's column name or query parameter you can check below:

###### To change filtered column name on some Filter just add to your custom filter:

```
protected function setColumn(): string
{
    return 'custom_column_name';
}
```

###### To change the query filter name:

```
protected function setQueryFilter(): string
{
    return 'custom_query_filter_name';
}
```

So the filter will add below code to Laravel query builder:

`where('custom_column_name', request('custom_query_filter_name'))`
