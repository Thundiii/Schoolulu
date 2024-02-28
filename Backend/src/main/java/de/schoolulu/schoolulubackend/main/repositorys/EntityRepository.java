package de.schoolulu.schoolulubackend.main.repositorys;

import java.util.Collection;
import java.util.List;
import java.util.Optional;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.repository.NoRepositoryBean;

/**
 * 
 * @param <T>
 */
@NoRepositoryBean
public interface EntityRepository<T> extends JpaRepository<T, Long> {

	/**
	 * @param id
	 * @return {@link #findById(Object)}
	 */
	default T findOne(Long id) {

		Optional<T> optionalEntity = this.findById(id);

		if (optionalEntity.isPresent()) {

			return optionalEntity.get();

		}

		return null;

	}

	/**
	 * @param entities
	 * @return {@link #saveAll(Iterable)}
	 */
	default Collection<T> save(Iterable<T> entities) {

		return this.saveAll(entities);

	}

	/**
	 * @param ids
	 * @return {@link #findAllById(Iterable)}
	 */
	default List<T> findAll(Iterable<Long> ids) {

		return this.findAllById(ids);

	}

	/**
	 * @param id
	 * @return {@link #existsById(Object)}
	 */
	default boolean exists(Long id) {

		return this.existsById(id);

	}

	/**
	 * @param id
	 */
	default void delete(Long id) {

		this.deleteById(id);

	}

}