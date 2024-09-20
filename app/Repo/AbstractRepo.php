<?php

namespace App\Repo;

use Illuminate\Pagination\Paginator;

class AbstractRepo
{
    protected $model;

    public function __construct(string $model)
    {
        $this->model = $model;
    }

    public function findOrFail($id)
    {
        return $this->model::findOrfail($id);
    }

    public function getAll()
    {
        return $this->model::get();
    }
    public function show($id)
    {
        return $this->model::where('id' , $id)->first();
    }
    public function getAllWith($key , $value)
    {
        return $this->model::where($key , $value)->paginate(6);
    }

    public function getPaginate($paginate = 10)
    {
        return $this->model::paginate($paginate);
    }



    public function getAllOrderBy($column,$sort)
    {
        return $this->model::orderBy($column,$sort)->get();
    }

    public function findWhere($column, $value)
    {
        return $this->model::where($column, $value)->get();
    }

    public function findWhereIn($column,Array $values)
    {
        return $this->model::whereIn($column, $values)->get();
    }

    public function getWhereOperand($column, $operand, $value)
    {
        return $this->model::where($column,$operand, $value)->get();
    }


    public function findWhereFirst($column, $value)
    {
        return $this->model::where($column, $value)->firstOrFail();
    }
    public function create($data)
    {
        return $this->model::create($data);
    }

    public function update($data, $item)
    {
        return $item->update($data);
    }
    public function Paginate(array $input, array $wheres, $model = null)
    {
        $currentPage = $input["offset"];
        Paginator::currentPageResolver(function () use ($currentPage) {
            return $currentPage;
        });
        $this->model = new $this->model;
        if ($input["resource"] == "custom" && is_array($input["resource_columns"]) && count($input["resource_columns"]) > 0) {
            $this->model = $this->model->select(implode(",",$input["resource_columns"]));
        }
        if ($input["deleted"] == "deleted") {
            $this->model = $this->model->onlyTrashed();
        }else  {
            $this->model = $this->model->withTrashed();
        }
        if ($input["with"] != []) {
            $this->model = $this->model->with($input["with"]);
        }
        if ($input["has"] != null) {
            $this->model = $this->model->whereHas($input["has"]);
        }
        if (count($wheres)) {
            foreach ($wheres as $where) {
                switch ($where[1]) {
                    case 'in':
                        $this->model = $this->model->whereIn($where[0], $where[2]);
                        break;
                    default:
                        $this->model = $this->model->where($where[0], $where[1], $where[2]);
                }
            }
//            $this->model = $this->model->orderBy($input["field"], $input["sort"]);
//            return $input["paginate"] != "false" ? $this->model->paginate($input["limit"]) : $this->model->get();
        }
        $this->model = $this->model->orderBy($input["field"], $input["sort"]);
        return $input["paginate"] != "false"? $this->model->paginate($input["limit"]) : $this->model->get();
    }
    public function Meta($data, $input)
    {
        $pages=[];
        if($input["paginate"]!= "false"){
            for($i=1;$i<=$data->lastPage();$i++){
                $pages[]=$i;
            }
        }
        return [
            'total' => $data->count(),
            'currentPage' => $input["offset"],
            'pages' => $pages,
            'lastPage' => $input["paginate"] != "false" ? $data->lastPage() : 1,
        ];

    }
    public function bulkDelete(array $ids)
    {
        $allRows = $this->model::withTrashed()->find($ids);
        foreach ($allRows as $row) {

            if ($row->trashed()) {
                $row->forceDelete();
            } else {
                $row->delete();
            }
        }
        return true;
    }

    public function bulkRestore(array $ids)
    {
        $allRows = $this->model::onlyTrashed()->find($ids);
        foreach ($allRows as $row) {
            $row->restore();
        }
        return true;
    }
}