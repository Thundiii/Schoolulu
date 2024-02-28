package de.schoolulu.schoolulubackend.main.entity;

import jakarta.persistence.CascadeType;
import jakarta.persistence.Entity;
import jakarta.persistence.FetchType;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;
import jakarta.persistence.OneToOne;
import jakarta.persistence.Table;

/**
 * @author Noah
 *
 */
@Entity
@Table(name = "reviews")
public class Review {

	/** */
	@Id
	@GeneratedValue(strategy = GenerationType.AUTO)
	private Long id;

	/** */
	@ManyToOne
	private User publisher;

	/** */
	@ManyToOne
	private School school;

	/** */
	@OneToOne(cascade = { CascadeType.PERSIST, CascadeType.MERGE,
			CascadeType.REMOVE }, fetch = FetchType.LAZY, orphanRemoval = true)
	@JoinColumn(name = "review_content_id")
	private ReviewContent reviewContent;

	/** */
	private long publishedDate;

	/**
	 * @param publisher
	 * @param schoolname
	 * @param reviewContent
	 * @param publishedDate
	 */
	public Review(User publisher, School schoolname) {
		this.setPublisher(publisher);
		this.setSchoolname(schoolname);
		this.setPublishedDate(System.currentTimeMillis());
	}

	/**
	 * @return
	 */
	public ReviewContent getReviewContent() {
		return reviewContent;
	}

	/**
	 * @param reviewContent
	 */
	public void setReviewContent(ReviewContent reviewContent) {
		this.reviewContent = reviewContent;
	}

	/**
	 * 
	 */
	public Review() {

		this.setPublishedDate(System.currentTimeMillis());

	}

	/**
	 * @return id
	 */
	public Long getId() {
		return this.id;
	}

	/**
	 * @param id
	 */
	public void setId(Long id) {
		this.id = id;
	}

	/**
	 * @return publisher
	 */
	public User getPublisher() {
		return publisher;
	}

	/**
	 * @param publisher
	 */
	public void setPublisher(User publisher) {
		this.publisher = publisher;
	}

	/**
	 * @return schoolname
	 */
	public School getSchoolname() {
		return school;
	}

	/**
	 * @param schoolname
	 */
	public void setSchoolname(School schoolname) {
		this.school = schoolname;
	}

	/**
	 * @return publishedDate
	 */
	public Long getPublishedDate() {
		return publishedDate;
	}

	/**
	 * @param publishedDate
	 */
	public void setPublishedDate(Long publishedDate) {
		this.publishedDate = publishedDate;
	}

}
