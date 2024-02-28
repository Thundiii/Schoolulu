package de.schoolulu.schoolulubackend.main.repositorys;

import de.schoolulu.schoolulubackend.main.entity.School;

/**
 * @author Noah
 *
 */
public interface SchoolRepository extends EntityRepository<School> {
	/**
	 * @param schoolname
	 * @return if school exists
	 */
	boolean existsBySchoolname(String schoolname);
	
	School findById(long id); 
	
}
