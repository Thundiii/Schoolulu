package de.schoolulu.schoolulubackend.main.repositorys;

import java.util.List;

import de.schoolulu.schoolulubackend.main.entity.Review;
import de.schoolulu.schoolulubackend.main.entity.School;
import de.schoolulu.schoolulubackend.main.entity.User;

public interface ReviewRepository extends EntityRepository<Review> {

	public List<Review> getAllByPublisher(User publisher);
	public List<Review> getAllBySchool(School school);
	
}