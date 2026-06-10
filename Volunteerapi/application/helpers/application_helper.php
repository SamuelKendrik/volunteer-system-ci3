<?php

function set_option($val, $selected = '')
{
	if ($val === $selected) {
		return '<option selected="selected">' . $val . '</option>';
	} else return '<option>' . $val . '</option>';
}
function set_options($val, $label, $selected = '')
{
	if ($val === $selected) {
		return '<option value="' . $val . '" selected="selected">' . $label . '</option>';
	} else return '<option value="' . $val . '">' . $label . '</option>';
}
function pagination_page($page)
{
	return ($page > 0) ? $page : 1;
}
function pagination_offset($page, $limit)
{
	return (pagination_page($page) - 1) * $limit;
}

function accessTopTree($company_id)
{
	$ci = &get_instance();
	$ci->load->model('master_companies_m');
	$company = $ci->master_companies_m->read($company_id);
	if ($company) {
		if ($company->n_parent_id != NULL) {
			$c = $ci->master_companies_m->read($company->n_parent_id);
			return getTopTree($c->n_company_id);
		} else {
			$d = $ci->master_companies_m->read($company->n_company_id);
			return $d->n_company_id;
		}
	}
}

function getTopTree($company_id)
{
	$ci = &get_instance();
	$ci->load->model('master_companies_m');
	$v = $ci->master_companies_m->read($company_id);
	if ($v->n_parent_id != null) {
		return getTopTree($v->n_parent_id);
	} else {
		return $v->n_company_id;
	}
}

function companyInAParent($company_id = null)
{
	$ci = &get_instance();
	$ci->load->model('master_companies_m');

	$result = array();
	$company = $ci->master_companies_m->read($company_id);
	if ($company) {
		$childs = $ci->master_companies_m->show(1, 9999, array('n_parent_id' => $company->n_company_id));

		$result[] = $company->n_company_id;
		if ($childs) {
			foreach ($childs as $ch) {
				$company_id = $ch->n_company_id;
				if ($ch->b_is_parent != 0) {
					$result[] = companyInAParent($company_id);
				} else {
					$result[] = $ch->n_company_id;
				}
			}
		}
	}

	return toMyArray($result);
}

function companyWithChild($company_id = null)
{
	$ci = &get_instance();
	$ci->load->model('master_companies_m');

	$result = array();
	$company = $ci->master_companies_m->read($company_id);
	$childs = $ci->master_companies_m->show(1, 9999, array('n_parent_id' => $company->n_company_id));
	$result[$company->n_company_id] = $company->c_company_name;
	if ($childs) {
		foreach ($childs as $ch) {
			$company_id = $ch->n_company_id;
			if ($ch->b_is_parent != 0) {
				$result[$company_id] = companyWithChild($company_id);
			} else {
				$result[$ch->n_company_id] = $ch->c_company_name;
			}
		}
	}

	return $result;
}

function toMyArray($list)
{
	$res = [];
	if (!is_array($list)) {
		return array($list);
	} else {
		foreach ($list as $line) {
			$res = array_merge($res, toMyArray($line));
		}
	}
	return $res;
}
