package de.schoolulu.schoolulubackend.main.repositorys;

import org.springframework.stereotype.Service;

import de.schoolulu.schoolulubackend.main.entity.User;

/**
 * @author Silas
 *
 */
@Service
public interface UserRepository extends EntityRepository<User> {
	/**
	 * @param name
	 * @return if user exists
	 */
	boolean existsByName(String name);

	/**
	 * @param email
	 * @return if user exists
	 */
	boolean existsByEmail(String email);

	/**
	 * @param name
	 * @return user
	 */
	User findByName(String name);
}
