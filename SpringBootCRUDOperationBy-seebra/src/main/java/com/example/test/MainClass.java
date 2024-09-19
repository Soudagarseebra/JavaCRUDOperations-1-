package com.example.test;

import java.util.List;
import java.util.Optional;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.ApplicationContext;

import com.example.test.dao.*;
import com.example.test.entities.*;

@SpringBootApplication

public class MainClass 
{
	
	public static studentrrepo stu_repo;
	public static employeesrepo emp_repo;
	static Students st;
	static Employees employees;
	static ApplicationContext context;
	
	public static void main(String[] args)
	{
	 context=	SpringApplication.run(MainClass.class, args);
	 emp_repo=	 context.getBean(employeesrepo.class);
     stu_repo=	 context.getBean(studentrrepo.class);
     
     setEmpData("michael",23,"michigan","scientist");
     saveStudentsData("aman",90);
     
     deleteStudentDataById(52);

     List<Employees> li=emp_repo.findByAddress("nagesh pvt-limited");
     li.forEach(E->
     {
     System.out.println(E);
     }
     );
     
    	}  
	public static String setEmpData(String emp_name,int age,String add,String post  )
	{
	  
	employees=new Employees();
	employees.setEmp_name(emp_name);
	employees.setEmp_age(age);
	employees.setAddress(add);
	employees.setEmp_post(post);
	Employees emp= emp_repo.save(employees);
	
	System.out.println(emp);
	System.out.println("success");
	return "data added in Employee table \n Emp-name :" 
	+emp_name+ "\n Emp-post :"+ 
	post+"\n Emp-age:"
+age+ "\n Emp-add:"+add;
 
	}

	
	public static String saveStudentsData(String name,int per)
	{
		st=new Students();
		

		st.setStu_name(name);
		st.setStu_Percentage(per);
		
		st=stu_repo.save(st);
		System.out.println(st);
		System.out.println("successfully student data is added ");
		return "data added in Student table \n student-name :" 
		+name+ "\n student percentage:"+per;
	}
	
	
	
	
	public static void deleteAllStudentData()
	{
		stu_repo.deleteAll();
		
		
			System.out.println("successfully data deleted  from students table ");
		
	 
	}
	
	
	public static void deleteAllEmployeeData()
	{
		emp_repo.deleteAll();
		
		
			System.out.println("successfully data deleted  from employees table");
		
	

	}
	
	public static void updateDataInEmployeesTable(int id2)
	{
		Optional<Employees> id= emp_repo.findById(id2);
		Employees e1=	id.get();
		e1.setEmp_id(23);
		e1.setEmp_name("Aamir");
		emp_repo.save(e1);
	Optional<Employees> o=	emp_repo.findById(23);
	Employees e3=o.get();
	
		System.out.println("updated data"
				+ " in employees table "+e3.getEmp_id()+" ,"+e3.getEmp_name());
		

	}
	
	
	
	
	
	
	public static void saveAllInStudentTable( List a)
	{
		 
		stu_repo.saveAll(a);
		
			System.out.println("successfully data added in   student table");
			
	}
	public static void deleteStudentDataById(int id)
	
	{
		stu_repo.deleteById(id);
		System.out.println("data successfully deleted from student table of the given id :"+id);
	}
	
	
}
	


