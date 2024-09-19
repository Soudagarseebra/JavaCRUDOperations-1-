package com.example.test.controller;

import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RestController;

import com.example.test.MainClass;
import com.example.test.entities.Employees;
import com.example.test.entities.Students;

@RestController
public class controllerclass 
{
	@Autowired MainClass demo;
	
//-------------------------Create Employee Methods---------------------------------
	@PostMapping("/createEmployeeData/{emp_name}/{emp_post}/{emp_add}/{emp_age}")
	public String createEmployeeData(@PathVariable String emp_name,
			
			@PathVariable String emp_post,
			@PathVariable String emp_add,@PathVariable int emp_age)
	{ 
demo.setEmpData(emp_name, emp_age, emp_add, emp_post);
		
		
		
		return "data added in Employee table \n Emp-name :" +emp_name+ "\n Emp-post :"+ 
		emp_post+"\n Emp-age:"
+emp_age+ "\n Emp-add:"+emp_add;
	}
	
	@PostMapping("/createRandomEmployeeData")
	public String createRandomEmployeeData()
	{ 
		String data=demo.setEmpData("sahil", 45, "brazil", "fitness trainer");
		
		System.out.println("accomplish");
		return data;
	}
	//----------------------Student Methods ---------------------------------
	
	@PostMapping("/createStudentData/{stu_name}/{stu_per}")
	public String createStudentData(@PathVariable String stu_name,@PathVariable int stu_per)
	{ 
		String data=demo.saveStudentsData(stu_name, stu_per);
		
		System.out.println("accomplish");
		return data;
}
	
	
	@PostMapping("/createRandomStudentData")
	public String createRandomStudentData()
	{ 
String data=demo.saveStudentsData("ritika", 60);
		
		System.out.println("accomplish");
		return data;
	}
	
//-------------------create operations completed--------------------------------
	
	
	
//-----------------------read operation of employee table ---------------------------
	
	@GetMapping("/GetEmployeeData")
	public Iterable getEmployeeData()
	{ 
		Iterable<Employees>   itr=demo.emp_repo.findAll();
		
		
		return itr;
	}
	@GetMapping("/GetEmployeeDataById/{id}")
	 
	public  Optional<Employees> getEmployeeDataById(@PathVariable int id)
	{ 
		Optional<Employees>  itr=demo.emp_repo.findById(id);
		
		
		return itr;
	
	
}

//---------read opeartions of student table ---------------------------
@GetMapping("/GetStudentData")
public Iterable getStudentData()
{ 
	Iterable<Students>   itr=demo.stu_repo.findAll();
	
	
	return itr;
}


@GetMapping("/GetStudentDataById/{id}")
public  Optional<Students> getStudentDataById(@PathVariable int id)
{ 
	Optional<Students>  itr=demo.stu_repo.findById(id);
	
	
	return itr;
}

//---------------------update operations of employee table ---------------

@PutMapping("/updateEmployeeData/{id}/{emp_name}/{emp_post}/{emp_add}/{emp_age}")
public String  updateEmployeeData(@PathVariable int id,@PathVariable String emp_name,
		
		@PathVariable String emp_post,
		@PathVariable String emp_add,@PathVariable int emp_age)
{ 
Optional<Employees> opt=	demo.emp_repo.findById(id);
Employees e=new Employees();

e=opt.get();
e.setEmp_name(emp_name);
e.setEmp_age(emp_age);
e.setEmp_post(emp_post);
e.setAddress(emp_add);
	
	demo.emp_repo.save(e);
	return "data updated \n"+e;
}

//----------------update operation of Student Data-----------------


@PutMapping("/updateStudentData/{id}/{stu_name}/{stu_per}")
public String  updateStudentData(@PathVariable int id,@PathVariable String stu_name,
		
		@PathVariable int stu_per
		)
{ 
Optional<Students> opt=	demo.stu_repo.findById(id);
Students e=new Students();

e=opt.get();
e.setStu_name(stu_name);
e.setStu_Percentage(stu_per);
	
	demo.stu_repo.save(e);
	return "data updated \n"+e;
}





//Delete Operation for both table
@DeleteMapping("/deleteEntireDataOf/{tab}")
public String delete(@PathVariable String tab)
{
	if(tab.equalsIgnoreCase("Students"))
	{
		demo.stu_repo.deleteAll();
	return "All Students Data Deleted" ;
	}
	
	else if(tab.equalsIgnoreCase("Employees"))
	{
		demo.emp_repo.deleteAll();
	return "All Employee Data Deleted";
	}
	else
		return null;
}


//-------------delete table data by id 


@DeleteMapping("/deleteDataOf/{tab}/ById/{id}")
public String delete(@PathVariable String tab,@PathVariable int id)
{
	if(tab.equalsIgnoreCase("Students"))
	{
	Optional <Students> opt=	demo.stu_repo.findById(id);
	
	demo.stu_repo.deleteById(id);
	
	return "Student data by id : "+id +"is deleted " ;
	}
	
	else if(tab.equalsIgnoreCase("Employees"))
	{
		Optional <Employees> opt=	demo.emp_repo.findById(id);
		
		demo.emp_repo.deleteById(id);
		
		return "Employee data by id : "+id +"is deleted " ;
	}
	else
		
		return null;
}

}